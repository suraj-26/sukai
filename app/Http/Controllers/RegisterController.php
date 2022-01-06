<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function signIn(){
        return view('web/register');
    }

    public function goSignIn(Request $req){
        $response = array();
        $userExists = DB::table('users_master')->Where('email', $req->input('email'))->where('status',1)->first();
        if(empty($userExists)){
            $password = $req->input('password');
            $hashedPassword = Hash::make($password);
            $patient_insert = DB::table('users_master')->insert([
                'name' => $req->input('name'),
                'email' => $req->input('email'),
                'password' => $hashedPassword,
                'contact' => $req->input('contact'),
                'address' => $req->input('address'),
                'status' => 1,
                'create_on' => Date('Y-m-d H:i:s'),
                'user_type' => 2
            ]);
            if($patient_insert){
                $response['status']=200;
                $response['data']='Registered successfully';
                return Redirect::to('login');
            }else{
                session()->flash('error','Something Went Wrong');
                return redirect('signIn');
            }

        }else{
            session()->flash('error','User Email Already Exists');
            return redirect('signIn');
        }
        echo json_encode($response);
    }
}
