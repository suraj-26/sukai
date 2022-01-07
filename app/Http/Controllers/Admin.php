<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class Admin extends Controller
{

    public function dashboard()
    {
        $patientlist = DB::table('users_master')->where('user_type','=', 2)->get();
        $patient = $patientlist->count();

        $serviceslist = DB::table('serveices')->get();
        $services = $serviceslist->count();

        $nursing = DB::table('order_details')->where(array('service_type'=>3))->get();
        $nurse = $nursing->count();

        $elderly = DB::table('order_details')->where(array('service_type'=>2))->get();
        $elder = $elderly->count();

        $labTest = DB::table('order_details')->where(array('service_type'=>1))->get();
        $lab = $labTest->count();

        $enquiry = DB::table('user_enquiry')->get();
        $enquiryCnt = $enquiry->count();
        return view('dashboard',array('patient'=>$patient,'services'=>$services,'nursing'=>$nurse,'elder'=>$elder,'lab'=>$lab,'enquiry'=>$enquiryCnt));
    }
    public function getPatientList()
    {
        $data = "";
        $patients = DB::select('SELECT * from users_master where user_type = 2');
        if(count($patients)>0)
        {
            foreach($patients as $row){
                $data .= '<tr>'
                .'<td>'.$row->name.'</td>'
                .'<td>'.$row->email.'</td>'
                .'<td>'.$row->contact.'</td>'
                .'<td>'.$row->address.'</td>'
                .'</tr>';
            }

        }
        return view('PatientList',array('data'=>$data));
    }

    public function getEnquiryList()
    {
        $data = "";
        $enquiry = DB::select('SELECT * from user_enquiry');
        if(count($enquiry)>0)
        {
            foreach($enquiry as $row){
                $data .= '<tr>'
                    .'<td>'.$row->name.'</td>'
                    .'<td>'.$row->mobile.'</td>'
                    .'<td>'.$row->location.'</td>'
                    .'<td>'.$row->services.'</td>'
                    .'</tr>';
            }

        }
        return view('EnquiryList',array('data'=>$data));
    }
}
