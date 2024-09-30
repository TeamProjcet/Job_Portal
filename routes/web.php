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
Route::resource('/createjob', \App\Http\Controllers\Backend\JobPostController::class);
Route::resource('company', \App\Http\Controllers\Backend\CompanyController::class);
Route::resource('/joblist', \App\Http\Controllers\Backend\JobPostController::class);
Route::resource('/jobseeker', \App\Http\Controllers\JobSeekersController::class);
Route::resource('/application',\App\Http\Controllers\ApplicationsController ::class);
Route::resource('/interview',\App\Http\Controllers\InterviewScheduleController ::class);
Route::resource('/message',\App\Http\Controllers\MessagesController ::class);
Route::resource('/saved',\App\Http\Controllers\SavedJobsController ::class);
Route::resource('/companyreviews',\App\Http\Controllers\CompanyReviewsController ::class);

Route::resource('blogpost', \App\Http\Controllers\Backend\BlogController::class);


Route::post('upload', [\App\Http\Controllers\Backend\UploadController::class, 'upload']);
Route::post('/required_data', [\App\Http\Controllers\SupportController::class, 'requireData']);
Route::get('/partTime', [\App\Http\Controllers\Backend\JobPostController::class,'partTime']);
Route::get('/fulTimelist', [\App\Http\Controllers\Backend\JobPostController::class,'fulTimelist']);



});

//frontend Route

Route::view('/{any}', 'frontend')->where('any', '.*');
Route::prefix('api')->group(function (){

});



