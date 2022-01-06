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
        return view('dashboard',array('patient'=>$patient,'services'=>$services));
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
}
