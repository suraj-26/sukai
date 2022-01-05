    <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Login;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
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

Route::get('Dashboard', function () {
    return view('page_sample');
});
Route::get('service', function () {
    return view('welcome');
});
Route::get('getServices',[ServiceController::class,'getServices']);

// Login Route
Route::get('login',[Login::class,'login']);
Route::post('goLogin',[Login::class,'goLogin']);
Route::get('logout',[Login::class,'logout']);

// Patient Routes
Route::get('signIn',[RegisterController::class,'signIn']);
Route::post('goSignIn',[RegisterController::class,'goSignIn']);

// order routes
Route::get('orderServices',[ServiceController::class,'orderServices']);
Route::get('order',[ServiceController::class,'order']);
Route::post('placeOrder',[ServiceController::class,'placeOrder']);

////Admin Order Details/////
Route::get('orders_list',[Orders::class,'getOrderDetails']);
Route::post('updateStatus',[Orders::class,'updateStatus']);
Route::post('UploadFile',[Orders::class,'UploadFile']);

//////Admin////////////////
Route::get('patient_list',[Admin::class,'getPatientList']);
Route::get('services',[ServiceController::class,'getServicesList']);


//////Home/////////
Route::get('/',[Home::class,'index']);
Route::get('Book',[Home::class,'Book']);
Route::get('Order_History',[Home::class,'UserOrderHistory']);
Route::post('getEnquiry',[Home::class,'getEnquiry']);
