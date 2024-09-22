<?php

use Illuminate\Support\Facades\Route;


//backend route
//=============>

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index']);

Route::view('admin/{any}', 'backend')->where('any', '.*');



//frontend route
//==============>

Route::view('/{any}', 'frontend')->where('any', '.*');