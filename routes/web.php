<?php

use Illuminate\Support\Facades\Route;


//backend route
//=============>

Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'index']);

Route::view('admin/{any}', 'singleApp')->where('any', '.*');



//frontend route
//==============>

Route::get('/', function (){
    echo "<h1 style='text-align: center'>Hello Job Portal Coming Soon</h1>";
});