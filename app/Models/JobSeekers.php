<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JobSeekers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resume',
        'skills',
        'experience',
        'education',
        'preferred_location',
        'availability',
    ];

    public function validator($input){

        return Validator::make($input, [
            'user_id'=> 'required',
            'resume'=> 'required',
            'skills'=> 'required',
            'experience'=> 'required',
            'education'=> 'required',
            'preferred_location'=> 'required',
            'availability'=> 'required'
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

}
