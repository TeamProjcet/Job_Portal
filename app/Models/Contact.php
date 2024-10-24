<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'subject', 'message',];

    public function validator($input){
        return Validator::make($input, [
            'name'=> 'required',
            'email'=>'required',
            'subject'=> 'nullable',
            'message'=> 'required|string',
        ]);
    }
}
