<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Company extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function validator($input){
        return Validator::make($input,[
            'name'=>'required '
        ]);
    }

    public function blogs(){
        return $this->hasMany(blog::class);
    }

    public function applications(){
        return $this->hasMany(Applications::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
