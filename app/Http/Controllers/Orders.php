<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class Orders extends Controller
{
    public function getOrderDetails()
    {
        $data = "";
        $order_details = DB::select('SELECT *,(select group_concat(service_name,"||",service_type) from serveices sd where sd.id = od.package ) as details, (select name from users_master um where um.id = od.patient_id ) as patient_name FROM `order_master` od where od.patient_id = 2');
        if(count($order_details)>0)
        {
            foreach($order_details as $row){
                $detail = $row->details;
                $details = explode('||', $detail);
                $status = "PENDING";
                $onclick = 'onclick="updateStatus('.$row->id.','.$row->package.','.$details[1].')"';
                if($row->order_status == 1)
                {
                    $status = "COMPLETED";
                    $onclick = "disabled";
                }
                $action  = '<button  class="btn btn-primary" '.$onclick.'>'.$status.'</button>';
                $service_name = "";
                if($details >= 1)
                {   
                    $service_name = $details[0];
                    if($details[1] == '1')
                    {
                        $action = '<button class="btn btn-primary" data-id="'.$row->id.'" data-service_id="'.$row->package.'" data-type="'.$details[1].'" data-backdrop="false" data-toggle="modal" data-target="#fileUpload">Upload Report</button> <button  class="btn btn-primary" '.$onclick.'>'.$status.'</button>';
                    }
                }
                $data .= '<tr>'
                .'<td>'.$row->patient_name.'</td>'
                .'<td>'.$service_name.'</td>'
                .'<td>'.$row->start_date.'</td>'
                .'<td>'.$row->end_date.'</td>'
                .'<td>'.$row->location.'</td>'
                .'<td>'.$action.'</td>'
                .'</tr>';
            }   
        }
        return view('OrderDetails',array('data'=>$data));
    }

    public function updateStatus(Request $request)
    {
        $type = $request->input('type');
        $id = $request->input('id');
        $service_id = $request->input('service_id');
        if($type == 1)
        {
            $checkReport = DB::select('SELECT report from order_details where order_id = '.$id.' and service_id = '.$service_id.' and (report = "" or report is null) ');
            if(count($checkReport) > 0)
            {
                $response['status'] = 301;
                $response['data']= "Report Not Uploaded";
                return response()->json($response,200);
                exit();
            }
        }
        if($id !='' && $id != null)
        {
            $updateOrderStatus =  DB::table('order_details')->where('order_id', $id)->where('service_id',$service_id)->update(['order_status' => 1]);
            if($updateOrderStatus)
            {
                $response['status']=200;
                $response['data']='Updated successfully';
            }
            else
            {
                $response['status']=201;
                $response['data']='Something went wrong';
            }
        }
        else
        {
            $response['status']=201;
            $response['data']='Required Parameter Missing';
        }
        return response()->json($response,200);
    }

    public function UploadFile(Request $request)
    {
        $id = $request->input('order_id');
        $service_id = $request->input('service_id');
        $type = $request->input('type');
        $file = $request->file('report');

        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        echo 'File Size: '.$file->getSize();
        echo '<br>';

        echo 'File Mime Type: '.$file->getMimeType();
        echo '<br>';
        $file->move(base_path('\uploads'),$file->getClientOriginalName());

        $uploadFile =  DB::table('order_details')->where('order_id', $id)->where('service_id',$service_id)->update(['report' => $file->getClientOriginalName()]);
        if($uploadFile)
        {
            echo "File Uploaded to Server";
        }
        else
        {
            echo 'File was not Uploaded to Server';
        }
    }
}

