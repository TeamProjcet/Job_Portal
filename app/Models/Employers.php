<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Employers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
        'company_website',
        'company_address',
        'contact_person',
        'industry',
        'company_description'
    ];

    public function validator($input){

        return Validator::make($input, [
            'user_id'=> 'required',
            'company_name'=> 'required',
            'company_website'=> 'required',
            'company_address'=> 'required',
            'contact_person'=> 'required',
            'industry'=> 'required',
            'company_description'=> 'required'
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
