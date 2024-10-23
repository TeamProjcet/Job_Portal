<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class blog extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','company_id', 'title', 'description', 'image', 'status'];

    public function validator($input){
        return Validator::make($input,[
            'company_id'=>'required ',
            'title'=>'required ',
            'description'=>'required ',
            'image'=>'required ',
            'status' => 'boolean',

        ]);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
