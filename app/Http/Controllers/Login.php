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
        $email = $req->input('email');
        $password = $req->input('password');


        $data = DB::table('users_master')->where(array("email" => $email))->first();
        if($data != null){
            if (!$data) {
                session()->flash('error', 'Login Fail, please check your email id');
                return redirect('login');
            }
            if (!Hash::check($password, $data->password)) {
                session()->flash('error', 'Login Fail, please check your password');
                return redirect('login');
            }
            session(['id' => $data->id, 'name' => $data->name]);
            session()->regenerate();
            if ($data->user_type == 1) {
                return redirect('/Dashboard');
            } else {
                return redirect('/');
            }
        }
        else
        {
            session()->flash('error', 'Login Fail, pls check your Email & password');
            return redirect('login');
        }

    }


    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
