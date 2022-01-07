<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
        $services = $req->input('services');
        $location = $req->input('location');
        $patient_id = session('id');

        $insert_enquiry = DB::table('user_enquiry')->insert([
            'patient_id' => $patient_id,
            'name' => $name,
            'mobile' => $mobile,
            'services' => $services,
            'location' => $location
        ]);
        if ($insert_enquiry) {
            session()->flash('success', 'Enquiry Registered for '.$name.'');
            return redirect('/');
        } else {
            session()->flash('error', 'Something Went Wrong');
            return redirect('/');
        }
    }
}

