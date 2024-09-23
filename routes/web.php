<?php

use Illuminate\Support\Facades\Route;


//backend route

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
Route::get('register', [\App\Http\Controllers\auth\AuthController::class, 'viewReg']);
Route::resource('/userRegister', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);

Route::prefix('api')->group(function (){

    Route::resource('/company', \App\Http\Controllers\Backend\CompanyController::class);


});
Route::view('admin/{any}', 'backend')->where('any', '.*')->middleware('auth');

//frontend Route

Route::view('/{any}', 'frontend')->where('any', '.*');



