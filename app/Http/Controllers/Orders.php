<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class Orders extends Controller
{
    public function getOrders()
    {
        return view('OrderDetails');
    }

    public function getOrderDetails(Request $req)
    {
        $type = $req->input('type');
        $data = "";
        $order_details = DB::select('SELECT *,(SELECT service_name from serveices where id = od.service_id) as service_name, (SELECT name from users_master where id = od.patient_id) as name FROM order_details od INNER JOIN order_master om ON od.order_id=om.id where service_type =' . $type . ' ');
        if (count($order_details) > 0) {
            foreach ($order_details as $row) {
                $status = "PENDING";
                $onclick = 'onclick="updateStatus(' . $row->id . ',' . $row->service_id . ',' . $row->service_type . ')"';
                if ($row->order_status == 1) {
                    $status = "COMPLETED";
                    $onclick = "disabled";
                }
                $action = '<button  class="btn btn-sm btn-primary" ' . $onclick . '>' . $status . '</button>';
                $service_name = "";
                $service_name = $row->service_name;
                if ($type == '1') {
                    $action = '<button class="btn btn-sm btn-primary" data-id="' . $row->id . '" data-service_id="' . $row->service_id . '" data-type="' . $row->service_type . '" data-backdrop="false" data-toggle="modal" data-target="#fileUpload"><i class="fas fa-cloud-upload-alt"></i></button> <button  class="btn btn-primary btn-sm m-1" ' . $onclick . '>' . $status . '</button>';
                }
                if($row->report != "" && $row->report != null)
                {
                    $download = URL::to("uploads/" . $row->report);
                    $file = '<a href="' . $download . '" download><i class="fas fa-download"></i></a>';
                }
                else
                {
                    $file = "";
                }
                $data .= '<tr>'
                    . '<td>' . $row->order_id . '</td>'
                    . '<td>' . $row->name . '</td>'
                    . '<td>' . $row->patient_name . '</td>'
                    . '<td>' . $service_name . '</td>'
                    . '<td>' . $row->start_date . '</td>'
                    . '<td class="end_Date">' . $row->end_date . '</td>'
                    . '<td>' . $row->location . '</td>'
                    . '<td class="reportFile">'.$file.'</td>'
                    . '<td>' . $action . '</td>'
                    . '</tr>';
            }
        }
        if ($data != null) {
            return response(['status'=>200,'data' => $data], 200);
        } else {
            return response(['status'=>201,'data' => "No Data Found"], 201);
        }
    }

    public function updateStatus(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $service_id = $request->input('service_id');
        if ($type == 1) {
            $checkReport = DB::select('SELECT report from order_details where order_id = ' . $id . ' and service_id = ' . $service_id . ' and (report = "" or report is null) ');
            if (count($checkReport) > 0) {
                $response['status'] = 301;
                $response['data'] = "Report Not Uploaded";
                return response()->json($response, 200);
                exit();
            }
        }
        if ($id != '' && $id != null) {
            $updateOrderStatus = DB::table('order_details')->where('order_id', $id)->where('service_id', $service_id)->update(['order_status' => 1]);
            if ($updateOrderStatus) {
                $response['status'] = 200;
                $response['data'] = 'Updated successfully';
            } else {
                $response['status'] = 201;
                $response['data'] = 'Something went wrong';
            }
        } else {
            $response['status'] = 201;
            $response['data'] = 'Required Parameter Missing';
        }
        return response()->json($response, 200);
    }

    public function UploadFile(Request $request)
    {
        $request->validate(
            [
                "report" => "required|mimes:pdf|max:10000"
            ],
            [
                'report.required' => 'Only Pdf Files are Allowed',
            ]
        );

        $id = $request->input('order_id');
        $service_id = $request->input('service_id');
        $type = $request->input('type');
        $file = $request->file('report');

//        echo 'File Name: '.$file->getClientOriginalName();
//        echo '<br>';
//
//        echo 'File Extension: '.$file->getClientOriginalExtension();
//        echo '<br>';
//
//        echo 'File Real Path: '.$file->getRealPath();
//        echo '<br>';
//
//        echo 'File Size: '.$file->getSize();
//        echo '<br>';
//
//        echo 'File Mime Type: '.$file->getMimeType();
//        echo '<br>';
        $file->move(base_path('public/uploads'), $file->getClientOriginalName());

        $uploadFile = DB::table('order_details')->where('order_id', $id)->where('service_id', $service_id)->update(['report' => $file->getClientOriginalName()]);
        if ($uploadFile) {
            return Redirect::to('orders_list');
        } else {
            echo 'File was not Uploaded to Server';
        }
    }
}

