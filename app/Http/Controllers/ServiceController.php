<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

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
        if ($end_date != null || $end_date != "") {
            $end_date = $end_date;
        } else {
            $end_date = "";
        }
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
                        'patient_id' => session('id'),
                        'created_by' => 1,
                        'created_on' => Date('Y-m-d H:i:s'),
                    );
                    array_push($arrOrderDet, $data);
                }
            }
        } else {
            if ($order_master_insert) {
                $data = array(
                    'order_id' => $order_master_insert,
                    'service_id' => $services,
                    'patient_id' => session('id'),
                    'created_by' => 1,
                    'created_on' => Date('Y-m-d H:i:s'),
                );
                array_push($arrOrderDet, $data);
            }
        }

        $package_det_insert = DB::table('order_details')->insert($arrOrderDet);
        if ($package_det_insert) {
            $response['status'] = 200;
            $response['data'] = 'Registered successfully';
            $response['dta1'] = $arrOrderDet;
            return redirect('/');
        } else {
            $response['status'] = 201;
            $response['data'] = 'Something went wrong';
        }
        echo json_encode($response);
    }
}
