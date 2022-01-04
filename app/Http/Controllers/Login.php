<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{

    public function login(){
        return view('login');
    }

    public function goLogin(Request $req){
        // return $req->input();
        $username = $req->input('username');
        $password = $req->input('password');
        $request = array();
        $data = DB::table('users_master')->where(array("user_name"=>$username,"password"=>$password,"user_type"=>2))->first();
        // $data = DB::select('select * from users_master where user_name="'.$username.'" AND  password="'.$password.'"');
        if(!empty($data)){

            $request['status']="200";
            $request['data']=$data;
        }else{
            $request['status']="201";
            $request['data']="Invalid Credentials.";
        }
        echo json_encode($request);
        // return DB::select('select id,service_name from serveices where status=1');
    }
}
