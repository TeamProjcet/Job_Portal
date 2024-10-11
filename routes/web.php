<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


//backend route

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index'])->name('login');
Route::get('userdata', [\App\Http\Controllers\auth\AuthController::class, 'userdata']);
Route::get('logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');
//Route::resource('/register', \App\Http\Controllers\auth\AuthController::class);
Route::post('adlogin', [\App\Http\Controllers\auth\AuthController::class, 'adlogin']);

Route::view('admin/{any}', 'backend')->where('any', '.*')->middleware('auth');

Route::prefix('api')->group(function () {
    Route::post('register', [\App\Http\Controllers\auth\AuthController::class, 'store']);

    Route::resource('categories', \App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('/company', \App\Http\Controllers\Backend\CompanyController::class);
    Route::resource('/createjob', \App\Http\Controllers\Backend\JobPostController::class);
    Route::resource('/joblist', \App\Http\Controllers\Backend\JobPostController::class);
    Route::resource('/jobseeker', \App\Http\Controllers\JobSeekersController::class);
    Route::resource('/employer', \App\Http\Controllers\EmployersController::class);
    Route::resource('/interview', \App\Http\Controllers\InterviewScheduleController ::class);
    Route::resource('/message', \App\Http\Controllers\MessagesController ::class);
    Route::resource('/saved', \App\Http\Controllers\SavedJobsController ::class);
    Route::resource('/companyreviews', \App\Http\Controllers\CompanyReviewsController ::class);
    Route::resource('/blogpost', \App\Http\Controllers\Backend\BlogController::class);

    Route::post('upload', [\App\Http\Controllers\Backend\UploadController::class, 'upload']);
    Route::post('/required_data', [\App\Http\Controllers\SupportController::class, 'requireData']);
    Route::post('/configurations', [\App\Http\Controllers\SupportController::class, 'getconfigurations']);
    Route::get('backendData',[\App\Http\Controllers\Backend\BackendController::class,'backendData']);
    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
    Route::resource('module',\App\Http\Controllers\ModuleController::class);
    Route::resource('roles',\App\Http\Controllers\RoleController::class);
    Route::get('/roles/{role}/permissions',[\App\Http\Controllers\RoleController::class,'getRolePermissions']);
    Route::post('/roles/{role}/permissions',[\App\Http\Controllers\RoleController::class,'updateRolePermissions']);

});

//frontend Route

Route::prefix('api/frontend')->group(function () {
    Route::get('joblist', [\App\Http\Controllers\frontend\FrontendController::class, 'joblist']);
    Route::get('seekerdata', [\App\Http\Controllers\frontend\FrontendController::class, 'seekerdata']);
    Route::get('jobcate/{cateId}', [\App\Http\Controllers\frontend\FrontendController::class, 'jobCategory'])->name('web.cat');
    Route::post('seekerregis', [\App\Http\Controllers\frontend\SeekerLoginController::class, 'store']);
    Route::post('seekerlogin', [\App\Http\Controllers\frontend\SeekerLoginController::class, 'login']);
    Route::post('blogpost/{id}/like', [\App\Http\Controllers\Backend\BlogController::class, 'like']);
    Route::post('seekerlogout', [\App\Http\Controllers\frontend\SeekerLoginController::class, 'logout']);
    Route::put('seeker/profile', [\App\Http\Controllers\frontend\SeekerLoginController::class, 'update']);
    Route::resource('favourites',\App\Http\Controllers\SavedJobsController::class);
    Route::resource('application', \App\Http\Controllers\frontend\ApplicationController::class);
});

Route::view('/{any}', 'frontend')->where('any', '.*');




