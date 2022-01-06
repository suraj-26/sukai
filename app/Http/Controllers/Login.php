<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function goLogin(Request $req)
    {
        // return $req->input();
        $email = $req->input('email');
        $password = $req->input('password');
//        $request = array();
//        $data = DB::table('users_master')->where(array("email"=>$email,"password"=>$password))->first();
//        if(!empty($data)){
//            session(['id'=>$data->id,'name'=>$data->name]);
//            session()->regenerate();
//            if($data->user_type == 1)
//            {
//                return redirect('/Dashboard');
//            }
//            else
//            {
//                return redirect('/');
//            }
//        }else{
//            $request['status']="201";
//            $request['data']="Invalid Credentials.";
//        }

        $data = DB::table('users_master')->where(array("email" => $email))->first();
        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $data->password)) {
            return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
        }
        session(['id' => $data->id, 'name' => $data->name]);
        session()->regenerate();
        if ($data->user_type == 1) {
            return redirect('/Dashboard');
        } else {
            return redirect('/');
        }
        return response()->json(['success' => true, 'message' => 'success', 'data' => $data]);

    }


    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
