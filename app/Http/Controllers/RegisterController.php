<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

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
                $this->sendEmail($req->input('email'),$req->input('name'));
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

    
    public function sendSMS($number,$templateData,$template,$templateID=1){
        $username="bharatmishra1";
        $password ="bharat@100";
        $sender="GLDBRZ";
        $message="";
        $postData = array(
            'user' => "bharatmishra1",
            'password'=>"bharat@100",
            'mobile' =>$number,
            'sender' => $sender,
            'type' => '3'
        );
        switch ($templateID){
            case 1:
                $postData["template_id"]=$template;
                $postData['message'] = "".$templateData['name']." has been admitted in the ".$templateData['center']." and has been allotted ".$templateData['bed']." in ".$templateData['room']." -Gold Berries";
                break;
            case 2:
                $postData["template_id"]=$template;
                $postData['message'] = "".$templateData['name']." has been transferred to ".$templateData['center']." in ".$templateData['bed']." in ".$templateData['room']." -Gold Berries";
                break;
            case 3:
                $postData["template_id"]=$template;
                $postData['message'] = "Treatment has been started for ".$templateData['otp']." -Gold Berries";
                $postData['message'] = "OTP for Login Transaction on ".$templateData['company']." is ".$templateData['otp']." and valid till ".$templateData['time'].".Do not share this OTP to anyone for security reasons -Gold Berries";
                break;
        }

        $client = new Client();
        $response = $client->request('GET', 'http://api.bulksmsgateway.in/sendmessage.php', array(
            'query' =>$postData
        ));
        return $response->getBody();

    }
    
    public function sendEmail($to,$name){
        $details = [
            'title'=> 'Mail from Sukai',
            'body'=>$this->email_body($name),
            'name'=>$name,
            'username'=>$to,
            'email_type'=>3,
        ];
        Mail::to($to)->send(new TestMail($details));
        return "Email Sent.";
    }

    public function email_body($name=''){
        $body = '<p>
            Hi '.$name.', please find the attached of your result.
        </p>
        <p>Warm Regards, as</p>
        <p><img src="{{ URL::asset("images/sukai_logo.png")}}" alt="" class="" width="50" height="50"></p>
        <p>
        <b>T : </b>+91 123456789 <br>
        <b>W : </b>www.sukai.com <br>
        513 Arenja Corner Sector 17 Mumbai-702
        </p>
        ';
    }

}
