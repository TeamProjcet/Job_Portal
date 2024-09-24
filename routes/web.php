<?php

use Illuminate\Support\Facades\Route;


//backend route

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
Route::get('register', [\App\Http\Controllers\auth\AuthController::class, 'viewReg']);
Route::resource('/userRegister', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);



Route::view('admin/{any}', 'backend')->where('any', '.*')->middleware('auth');

Route::prefix('api')->group(function (){
Route::resource('categories', \App\Http\Controllers\Backend\CategoryController::class);
Route::resource('/company', \App\Http\Controllers\Backend\CompanyController::class);
//Route::resource('/job', \App\Http\Controllers\Backend\JobPostController::class);
Route::resource('/createjob', \App\Http\Controllers\Backend\JobPostController::class);

Route::resource('blogpost', \App\Http\Controllers\Backend\BlogController::class);

Route::post('upload', [\App\Http\Controllers\Backend\UploadController::class, 'upload']);
Route::post('/required_data', [\App\Http\Controllers\SupportController::class, 'requireData']);
});

//frontend Route

Route::view('/{any}', 'frontend')->where('any', '.*');



