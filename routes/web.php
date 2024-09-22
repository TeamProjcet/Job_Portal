<?php

use Illuminate\Support\Facades\Route;


//backend route
//=============>

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index']);
Route::get('register', [\App\Http\Controllers\auth\AuthController::class, 'viewReg']);
Route::resource('/userRegister', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout']);


Route::view('admin/{any}', 'backend')->where('any', '.*');



//frontend route
//==============>
//<<<<<<< HEAD
//=======
//
//>>>>>>> 4dc384f (hafoi)
//Route::view('/{any}', 'frontend')->where('any', '.*');
