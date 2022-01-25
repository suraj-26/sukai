<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class Home extends Controller
{
    public function index()
    {
        return view('web/index');
    }

    public function Book()
    {
        return view('web/book_now');
    }

    public function UserOrderHistory()
    {
        $data = "";
        $id = session('id');
//        $order_details = DB::select('SELECT *,(select service_name from serveices sd where sd.id in (select service_id from order_details where order_id = od.id) ) as details, (select name from users_master um where um.id = od.patient_id ) as patient, (select order_status from order_details odd where odd.order_id = od.id ) as status FROM `order_master` od where od.patient_id ='.$id.' ');
        $order_details = DB::select('SELECT *,(SELECT service_name from serveices where id = od.service_id) as service_name FROM order_details od INNER JOIN order_master om ON od.order_id=om.id where om.patient_id =' . $id . ' ');
        if (count($order_details) > 0) {
            foreach ($order_details as $row) {
                if ($row->end_date != "" && $row->end_date != null) {
                    $date = '<div class="badge badge-secondary">' . $row->start_date . '</div> - &nbsp;<div class="badge badge-secondary">' . $row->end_date . '</div>';
                } else {
                    $date = '<div class="badge badge-secondary">' . $row->start_date . '</div>';
                }
                $status = "PENDING";
                $color = "badge-danger";
                if ($row->order_status == 1) {
                    $status = "COMPLETED";
                    $color = "badge-success";
                }
                if($row->report !=""){
                    $download ='<a href="'. URL::to("uploads/".$row->report).'" download><i class="fas fa-download"></i></a>';
                }else{
                    $download="";
                }
                $data .= '<tr>'
                    . '<td>' . $row->patient_name . '</td>'
                    . '<td>' . $row->service_name . '</td>'
                    . '<td>' . $date . '</td>'
                    . '<td>' . $row->location . '</td>'
                    . '<td>'.$download.'</td>'
                    . '<td><div class="badge ' . $color . '">' . $status . '</div></td>'
                    . '</tr>';
            }
        }

        $user_details = DB::table('users_master')->where(array('id' => $id))->first();
        $userData = array();
        if ($user_details != null) {
            $userData = array(
                'id' => $user_details->id,
                'name' => $user_details->name,
                'email' => $user_details->email,
                'contact' => $user_details->contact,
                'address' => $user_details->address
            );
        }
        return view('web/UserProfile', array('data' => $data, 'User' => $userData));
    }

    public function UpdateProfileDetails(Request $req)
    {
        $req->validate(
            [
                'name' => "required",
                'mobile' => "mobile",
                'address' => "required",
            ],
        );

        $id = $req->input('id');

        $patient_update = DB::table('users_master')->where(['id' => $id])->update([
            'name' => $req->input('name'),
            'email' => $req->input('email'),
            'contact' => $req->input('contact'),
            'address' => $req->input('address'),
        ]);

        if($patient_update)
        {
            session()->flash('success', 'User Data Updated Successfully');
            return redirect('User_Profile');
        }
        else
        {
            session()->flash('error', 'Something Went Wrong');
            return redirect('User_Profile');
        }
    }


    public function getEnquiry(Request $req)
    {
        $name = $req->input('Name');
        $mobile = $req->input('mobile');
        $email = $req->input('email');
        $services = $req->input('services');
        $location = $req->input('location');
        if(session('id')){
            $patient_id = session('id');
        }else{
            $last_id = DB::table('user_enquiry')->orderBy('id', 'desc')->first();//SELECT MAX(id) FROM tablename;
            $patient_id = intval($last_id->id)+1;
        }

        $insert_enquiry = DB::table('user_enquiry')->insert([
            'patient_id' => $patient_id,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'services' => $services,
            'location' => $location
        ]);
        if ($insert_enquiry) {
           
            $this->sendEmail($email,$name);
            // $sms = $this->sendSMS($mobile, array('name' => $name, 'otp' => $patient_id, 'time' => date('H:i:s'),'center'=>'vashi','room'=>'1','bed'=>'1','company'=>'gbtech'), '1107164205399035078',3);
            
            // if($sms){
            //     session()->flash('success', 'Enquiry Registered for '.$name.'');
                return redirect('/');
            // }else{
            //     return view('enquiry_form');
            // }
        } else {
            session()->flash('error', 'Something Went Wrong');
            return redirect('/');
        }
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
    
    public function sendEmail($to,$name){
        $details = [
            'title'=> 'Mail from Sukai',
            'body'=>$this->email_body($name),
            'name'=>$name,
            'email_type'=>1,
        ];
        Mail::to($to)->send(new TestMail($details));
        return "Email Sent.";
    }

    public function email_body($name=''){
        $body = '<p>
            Hi '.$name.', please find the attached of your result.
        </p>
        <p>Warm Regards, as</p>
        <p><img src="{{ URL::asset("images/sukai_logo.png")}}" alt="" class="" width="50" height="50"></p>
        <p>
        <b>T : </b>+91 123456789 <br>
        <b>W : </b>www.sukai.com <br>
        513 Arenja Corner Sector 17 Mumbai-702
        </p>
        ';
    }
}

