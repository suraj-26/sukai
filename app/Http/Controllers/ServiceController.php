<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function getServices(){
        return DB::select('select id,service_name from serveices where status=1');
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
                'status' => 1,
                'patient_id' => $req->input('user_id'),
                'created_on' => Date('Y-m-d H:i:s'),
                'created_by' => 1
            ]);
            if($order_master_insert){
                $package_det = DB::table('package_details')->where('package_id',$req->input('package'))->get();
                $arrOrderDet = array();
                foreach($package_det as $package_det_row){
                    $data = array(
                        'order_id' => $order_master_insert,
                        'service_id' => $package_det_row->service_id,
                        'patient_id' => $req->input('user_id'),
                        'created_by' => 1,
                        'created_on' => Date('Y-m-d H:i:s'),
                        'status' => 1,
                        'location'=> $req->input('location'),
                        'start_dt' => $req->input('start_dt'),
                        'end_date' => $req->input('end_date'),
                        'schedule_time_from' => $req->input('schedule_time_from'),
                        'schedule_time_to' => $req->input('schedule_time_to')
                    }
                    array_push($arrOrderDet,$data);
                }
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
