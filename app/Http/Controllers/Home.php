<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

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
        $order_details = DB::select('SELECT *,(SELECT service_name from serveices where id = od.service_id) as service_name FROM order_details od INNER JOIN order_master om ON od.order_id=om.id where om.patient_id ='.$id.' ');
        if(count($order_details)>0)
        {
            foreach($order_details as $row){
                $status = "PENDING";
               $color = "btn-danger";
                if($row->order_status == 1)
                {
                    $status = "COMPLETED";
                    $color = "btn-success";
                }
                $data .= '<tr>'
                .'<td>'.$row->patient_name.'</td>'
                .'<td>'.$row->service_name.'</td>'
                .'<td>'.$row->start_date.'</td>'
                .'<td>'.$row->end_date.'</td>'
                .'<td>'.$row->location.'</td>'
                .'<td><button class="btn '.$color.'">'.$status.'</button></td>'
                .'</tr>';
            }
        }
        return view('web/OrderHistory',array('data'=>$data));
    }
}
