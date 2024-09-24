<?php

use Illuminate\Support\Facades\Route;


//backend route

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
Route::get('register', [\App\Http\Controllers\auth\AuthController::class, 'viewReg']);
Route::resource('/userRegister', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);
<<<<<<< HEAD

Route::prefix('api')->group(function (){
    Route::resource('categories', \App\Http\Controllers\Backend\CategoryController::class);

    Route::resource('/company', \App\Http\Controllers\Backend\CompanyController::class);

=======
Route::group(['middleware'=>'auth'],function (){
>>>>>>> saref

});

Route::view('admin/{any}', 'backend')->where('any', '.*')->middleware('auth');

Route::prefix('api')->group(function (){
Route::resource('/job', \App\Http\Controllers\Backend\JobPostController::class);
    Route::post('upload', [\App\Http\Controllers\Backend\UploadController::class, 'upload']);
});

//frontend Route

Route::view('/{any}', 'frontend')->where('any', '.*');



