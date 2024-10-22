<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Frontendmanage extends Model
{
    use HasFactory;
    protected $table='frontendmanages';
    protected $fillable=['image','email','phone','map','location','title','details','facebook','youtube','linkdin','twitter'];

    public function validator($input){
        return Validator::make($input,[
            'image'=>'required',
            'email'=>'required',
            'location'=>'required',
            'phone'=>'required',
            'map'=>'required',
            'facebook'=>'',
            'youtube'=>'',
            'linkdin'=>'',
            'twitter'=>'',
            'title'=>'required',
            'details'=>'required',
        ]);
    }
}
