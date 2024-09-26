<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JobPostModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','position', 'salary', 'company_id', 'address', 'job_type', 'details', 'date_time', 'image',
    ];

    public function validator($input){
        return Validator::make($input,[
            'category_id'=>'required ',
            'position'=>'required ',
            'salary'=>'required ',
            'company_id'=>'required ',
            'address'=>'required ',
            'job_type'=>'required ',
            'details'=>'required ',
            'date_time'=>'required ',
            'image'=>'required',
        ]);
    }
}
