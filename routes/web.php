<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Login;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('getServices', [ServiceController::class, 'getServices']);

// Login Route
Route::get('login', [Login::class, 'login']);
Route::post('goLogin', [Login::class, 'goLogin']);
Route::get('logout', [Login::class, 'logout']);

// Patient Routes
Route::get('signIn', [RegisterController::class, 'signIn']);
Route::post('goSignIn', [RegisterController::class, 'goSignIn']);

// order routes
Route::get('orderServices', [ServiceController::class, 'orderServices']);
Route::get('order', [ServiceController::class, 'order']);
Route::post('placeOrder', [ServiceController::class, 'placeOrder']);
Route::get('getPackages/{type}', [ServiceController::class, 'getPackages']);
Route::get('getPackageDet/{package_id}', [ServiceController::class, 'getPackageDet']);
Route::get('packages', function(){
	return view('packages');
});

////Admin Order Details/////
Route::get('orders_list', [Orders::class, 'getOrders']);
Route::post('order_details', [Orders::class, 'getOrderDetails']);
Route::post('updateStatus', [Orders::class, 'updateStatus']);
Route::post('UploadFile', [Orders::class, 'UploadFile']);

//////Admin////////////////
Route::get('Dashboard', [Admin::class, 'dashboard']);
Route::get('patient_list', [Admin::class, 'getPatientList']);
Route::get('services', [ServiceController::class, 'getServicesList']);
Route::get('enquiry', [Admin::class, 'getEnquiryList']);


//////Home/////////
Route::get('/', [Home::class, 'index']);
Route::get('Book', [Home::class, 'Book']);
Route::get('User_Profile', [Home::class, 'UserOrderHistory']);
Route::view('enquiry_form', 'enquiry_form');
Route::post('getEnquiry', [Home::class, 'getEnquiry']);
Route::post('UpdateProfileDetails', [Home::class, 'UpdateProfileDetails']);

Route::get('sendSMS2',[Home::class,'sendSMS2']);
Route::get('sendSMS3',[Home::class,'sendSMS3']);

Route::view('enquiry','enquiry_form');
Route::get('send_email',[MailController::class,'sendEmail']);

Route::view('services','basic_services');
Route::view('select_nurse_form','select_nurse_form');
Route::view('payment_gateway','payment_gateway');
Route::view('invoice','invoice');
Route::view('select_basic_services','select_basic_services');


