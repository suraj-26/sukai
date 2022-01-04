<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function getServices(){
        return DB::select('select id,service_name from serveices where status=1');
    }

    public function getServicesList()
    {
        $data = "";
        $services = DB::select('SELECT * from serveices where status = 1 order by service_type desc');
        if(count($services)>0)
        {
            foreach($services as $row){   
            $serviceType = $row->service_type;
            $type = "Lab Test";
            if($serviceType == 2)
            {
                $type = "Elderly Services";
            }
            if($serviceType ==3)
            {
                $type = "Nursing Services";
            } 
                $data .= '<tr>'
                .'<td>'.$row->service_id.'</td>'
                .'<td>'.$row->service_name.'</td>'
                .'<td>'.$row->service_rate.'</td>'
                .'<td>'.$type.'</td>'
                .'</tr>';
            }

        }
        return view('services',array('data'=>$data));

    }

    public function orderServices(){
        return view('orderServices');
    }
    public function order(){
        return view('order');
    }

    public function placeOrder(Request $req){
        $response = array();
            $order_master_insert = DB::table('order_master')->insertGetId([
                'package' => $req->input('package'),
                'location'=> $req->input('location'),
                'start_date' => $req->input('start_dt'),
                'end_date' => $req->input('end_date'),
                'start_time' => $req->input('schedule_time_from'),
                'end_time' => $req->input('schedule_time_to'),
                'patient_id' => $req->input('user_id'),
                'created_on' => Date('Y-m-d H:i:s'),
                'created_by' => 1
            ]);
            $arrOrderDet = array();

            if($order_master_insert){
                // $package_det = DB::table('package_details')->where('package_id',)->get();
                // foreach($package_det as $package_det_row){
                    $data = array(
                        'order_id' => $order_master_insert,
                        'service_id' => $req->input('package'),
                        'patient_id' => $req->input('user_id'),
                        'created_by' => 1,
                        'created_on' => Date('Y-m-d H:i:s'),
                    );
                    // }
                    array_push($arrOrderDet,$data);

                $package_det_insert = DB::table('order_details')->insert($arrOrderDet);
                if($package_det_insert){
                    $response['status']=200;
                    $response['data']='Registered successfully';
                }else{
                    $response['status']=201;
                    $response['data']='Something went wrong';
                }
            }else{
                $response['status']=201;
                $response['data']='Something went wrong';
            }
        echo json_encode($response);
    }
}
