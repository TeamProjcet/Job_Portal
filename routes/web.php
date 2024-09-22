<?php

use Illuminate\Support\Facades\Route;


//backend route
//=============>
Route::group(['middleware'=>'auth'],function (){

});
Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::get('register', [\App\Http\Controllers\auth\AuthController::class, 'viewReg']);
Route::resource('/userRegister', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout']);

Route::view('admin/{any}', 'backend')->where('any', '.*')->middleware('auth');

Route::view('/{any}', 'frontend')->where('any', '.*');



