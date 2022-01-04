<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function signIn(){
        return view('signIn');
    }
    
    public function goSignIn(Request $req){
        $response = array();
        $userExists = DB::table('users_master')->where("user_name",$req->input('user_name'))->orWhere('email', $req->input('email'))->where('status',1)->first();
        if(empty($userExists)){
            $patient_insert = DB::table('users_master')->insert([
                'name' => $req->input('name'),
                'user_name' => $req->input('user_name'),
                'email' => $req->input('email'),
                'password' => $req->input('password'),
                'contact' => $req->input('contact'),
                'address' => $req->input('address'),
                'alt_address' => $req->input('alt_address'),
                'status' => 1,
                'create_on' => Date('Y-m-d H:i:s'),
                'create_by' => $req->input('contact'),
                'user_type' => 2
            ]);
            if($patient_insert){
                $response['status']=200;
                $response['data']='Registered successfully';
            }else{
                $response['status']=201;
                $response['data']='Something went wrong';
            }
            
        }else{
            $response['status']=201;
            $response['data']='Patient already exists';
        }
        echo json_encode($response);
    }
}
