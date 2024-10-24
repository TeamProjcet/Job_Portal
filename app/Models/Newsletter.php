<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Newsletter extends Model
{
    use HasFactory;
    protected $fillable = ["email","details"];

    public function validator($input){
        return Validator::make($input, [
            'email'=>'required|email|unique:newsletters,email',
            'details'=>'',
            'Url'=>'',
        ]);
    }
}
