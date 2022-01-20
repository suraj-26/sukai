<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title'=> 'mail from laravel',
            'body'=>'This is testing mail'
        ];
        Mail::to("wordpressavi3719@gmail.com")->send(new TestMail($details));
        return "Email Sent.";
    }
}
