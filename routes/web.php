<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Login;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('page_sample');
});
Route::get('service', function () {
    return view('welcome');
});
Route::get('getServices',[ServiceController::class,'getServices']);

// Login Route
Route::get('login',[Login::class,'login']);
Route::post('goLogin',[Login::class,'goLogin']);

// Patient Routes
Route::get('signIn',[RegisterController::class,'signIn']);
Route::post('goSignIn',[RegisterController::class,'goSignIn']);

// order routes
Route::get('orderServices',[ServiceController::class,'orderServices']);
Route::get('order',[ServiceController::class,'order']);
Route::post('placeOrder',[ServiceController::class,'placeOrder']);