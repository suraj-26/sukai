<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $data = DB::table('users_master')->where(array("user_name"=>$username,"password"=>$password))->first();
        if(!empty($data)){
            session(['id'=>$data->id,'name'=>$data->name]);
            session()->regenerate();
            if($data->user_type == 1)
            {
                return redirect('/Dashboard');
            }
            else
            {
                return redirect('/');
            }
        }else{
            $request['status']="201";
            $request['data']="Invalid Credentials.";
        }
    }


    public function logout()
    {
        Session::flush();
         return redirect('/');
    }
}
