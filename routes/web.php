<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Customer;
use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['middleware' => ['guest']], function () { 

    Route::get('/', function () {
        return view('welcome');
    })->name('/');

    Route::post('register-post',[AuthController::class, 'registerpost'])->name('register-post');
    Route::post('login-user',[AuthController::class, 'login']);

});

    Route::get('signout', [AuthController::class, 'signout'])->name("signout");
    

    Route::group(['middleware' => ['auth']], function () { 

    Route::middleware([admin::class])->group(function(){
    //Admin
    Route::get('admin-home',[AdminController::class, 'index']);
    Route::get('userslist',[AdminController::class, 'users']);
    Route::get('create-user',[AdminController::class, 'createuser']);
    Route::post('postUser',[AdminController::class, 'postUser']);
    Route::get('edit-user/{id}',[AdminController::class, 'edituser']);
    Route::get('delete-user/{id}',[AdminController::class, 'deleteuser']);
    Route::get('view-user/{id}',[AdminController::class, 'viewuser']);
    Route::post('updateUser/{id}',[AdminController::class, 'updateUser']);
    Route::any('delete-user/{id}',[AdminController::class, 'deleteuser']);
    Route::get('orderlist',[AdminController::class, 'orders']);
    Route::any('updateOrderStatus/{id}',[AdminController::class, 'updateOrderStatus']);
    Route::get('view-order/{id}',[AdminController::class, 'vieworder']);
    Route::get('feedbacklist',[AdminController::class, 'feedback']);
    });
    
    

    Route::middleware([customer::class])->group(function(){
    Route::get('customer-home',[CustomerController::class, 'index']);
    Route::any('shopnow',[CustomerController::class, 'shopnow'])->name('shopnow');
    Route::get('checkout/{id}',[CustomerController::class, 'checkout']);
    Route::post('storeCheckout/{id}',[CustomerController::class, 'storeCheckout']);
    Route::get('myorders',[CustomerController::class, 'myorders']);
    Route::get('myprofile',[CustomerController::class, 'profile']);
    Route::post('updateprofile',[CustomerController::class, 'updateprofile']);
    Route::post('changepassword',[CustomerController::class, 'changepassword']);
    Route::get('provideFeedback/{id}',[CustomerController::class, 'provideFeedback']);
    Route::post('storeFeedback/{id}',[CustomerController::class, 'storeFeedback']);

    Route::any('returnPayment/{id}',[CustomerController::class, 'returnPayment']);
    
    });
    
    });
    
    
    
    
    
    
    
    
    
    
