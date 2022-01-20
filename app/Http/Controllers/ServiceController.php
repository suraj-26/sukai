<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ServiceController extends Controller
{
    public function getServices()
    {
        $services = DB::select('select id,service_name from serveices where status=1 and service_type = 1');
        if (count($services) > 0) {
            $response['status'] = 200;
            $response['body'] = $services;
        } else {
            $response['status'] = 201;
            $response['body'] = "No Data Found";
        }
        echo json_encode($response);
    }

    public function getServicesList()
    {
        $data = "";
        $services = DB::select('SELECT * from serveices where status = 1 order by service_type desc');
        if (count($services) > 0) {
            foreach ($services as $row) {
                $serviceType = $row->service_type;
                $type = "Lab Test";
                if ($serviceType == 2) {
                    $type = "Elderly Services";
                }
                if ($serviceType == 3) {
                    $type = "Nursing Services";
                }
                $data .= '<tr>'
                    . '<td>' . $row->service_id . '</td>'
                    . '<td>' . $row->service_name . '</td>'
                    . '<td>' . $row->service_rate . '</td>'
                    . '<td>' . $type . '</td>'
                    . '</tr>';
            }

        }
        return view('services', array('data' => $data));

    }

    public function orderServices()
    {
        return view('orderServices');
    }

    public function order()
    {
        return view('order');
    }

    public function placeOrder(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'start_date' => 'required',
        ]);
        $end_date = $req->input('end_date');

        $type = $req->input('type');
        $services = $req->input('service_code');
        $arrOrderDet = array();

        $order_master_insert = DB::table('order_master')->insertGetId([
            'location' => $req->input('location'),
            'start_date' => $req->input('start_date'),
            'end_date' => $end_date,
            'patient_id' => session('id'),
            'patient_name' => $req->input('name'),
            'created_on' => Date('Y-m-d H:i:s'),
            'created_by' => 1
        ]);
        if ($type == 3) {
            if ($order_master_insert) {
                $serviceArray = explode(",", $services);

                foreach ($serviceArray as $row) {
                    $data = array(
                        'order_id' => $order_master_insert,
                        'service_id' => $row,
                        'service_type' => 1,
                        'patient_id' => session('id'),
                        'created_by' => 1,
                        'created_on' => Date('Y-m-d H:i:s'),
                    );
                    array_push($arrOrderDet, $data);
                }
            }
        } else {
            $service_type = 0;
            if($type == 1)
            {
                $service_type = 2;
            }
            if($type == 2)
            {
                $service_type = 3;
            }
            if ($order_master_insert) {
                $data = array(
                    'order_id' => $order_master_insert,
                    'service_id' => $services,
                    'service_type' => $service_type,
                    'patient_id' => session('id'),
                    'created_by' => 1,
                    'created_on' => Date('Y-m-d H:i:s'),
                );
                array_push($arrOrderDet, $data);
            }
        }

        $package_det_insert = DB::table('order_details')->insert($arrOrderDet);
        if ($package_det_insert) {
            $patient_det = DB::table('users_master')->where('id', session('id'))->first();
            $sms = $this->sendSMS($patient_det->mobile, array('name' => $patient_det->name, 'otp' => $patient_det->id, 'time' => date('H:i:s'),'center'=>'vashi','room'=>'1','bed'=>'1','company'=>'gbtech'), '1107164205399035078',3);
            $this->sendEmail($patient_det->email);
            // sendSMS(session('mobile'), array('name' => session('name'), 'otp' => session('id'), 'time' => date('H')), '1107164205399035078', '1');
            return redirect('User_Profile');
        } else {
            session()->flash('error', 'Something Went Wrong');
            return redirect('/');
        }
        echo json_encode($response);
    }

    public function getPackages($type){

        $packages = DB::select('select * from package_master where package_type ='.$type.' and status = 1');
        if (count($packages) > 0) {
            $response['status'] = 200;
            $response['body'] = $packages;
        } else {
            $response['status'] = 201;
            $response['body'] = "No Data Found";
        }
        echo json_encode($response);
    }

    public function getPackageDet($package_id){

        $packageDet = DB::select('SELECT *,(select pm.package_name from package_master pm where pm.id = pd.package_id) as package_name FROM package_details pd where package_id = '.$package_id);
        if (count($packageDet) > 0) {
            $response['status'] = 200;
            $response['body'] = $packageDet;
        } else {
            $response['status'] = 201;
            $response['body'] = "No Data Found";
        }
        echo json_encode($response);
    }
    
    
    public function sendSMS($number,$templateData,$template,$templateID=1){
        $username="bharatmishra1";
        $password ="bharat@100";
        $sender="GLDBRZ";
        $message="";
        $postData = array(
            'user' => "bharatmishra1",
            'password'=>"bharat@100",
            'mobile' =>$number,
            'sender' => $sender,
            'type' => '3'
        );
        switch ($templateID){
            case 1:
                $postData["template_id"]=$template;
                $postData['message'] = "".$templateData['name']." has been admitted in the ".$templateData['center']." and has been allotted ".$templateData['bed']." in ".$templateData['room']." -Gold Berries";
                break;
            case 2:
                $postData["template_id"]=$template;
                $postData['message'] = "".$templateData['name']." has been transferred to ".$templateData['center']." in ".$templateData['bed']." in ".$templateData['room']." -Gold Berries";
                break;
            case 3:
                $postData["template_id"]=$template;
                $postData['message'] = "Treatment has been started for ".$templateData['otp']." -Gold Berries";
                $postData['message'] = "OTP for Login Transaction on ".$templateData['company']." is ".$templateData['otp']." and valid till ".$templateData['time'].".Do not share this OTP to anyone for security reasons -Gold Berries";
                break;
        }

        $client = new Client();
        $response = $client->request('GET', 'http://api.bulksmsgateway.in/sendmessage.php', array(
            'query' =>$postData
        ));
        return $response->getBody();

    }
    
    public function sendEmail($to){
        $details = [
            'title'=> 'Mail from Sukai',
            'body'=>'Thank you for contact with us'
        ];
        Mail::to($to)->send(new TestMail($details));
        return "Email Sent.";
    }
}
