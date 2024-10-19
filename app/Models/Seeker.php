<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class Seeker extends Authenticatable
{
    use HasFactory,Notifiable, HasApiTokens;
    protected $fillable = ['name','email','phone','address','bio','profile_picture','skills','education','experience',];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function validator($input){
        return Validator::make($input,[
            'name'=>'required ',
            'email' => 'required',
            'profile_picture'=>'',
            'phone'=>'',
            'address'=>'',
            'bio'=>'  ',
            'skills'=>' ',
            'education'=>' ',
            'experience'=>' ',
        ]);
    }

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }

}
