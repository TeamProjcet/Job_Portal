<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class blog extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'title', 'description', 'image'];

    public function validator($input){
        return Validator::make($input,[
            'company_id'=>'required ',
            'title'=>'required ',
            'description'=>'required ',
            'image'=>'required ',

        ]);
    }
}
