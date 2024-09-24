<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JobPostModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'salary', 'company', 'address', 'job_type', 'details', 'date_time', 'image',
    ];

    public function validator($input){
        return Validator::make($input,[
            'name'=>'required '
        ]);
    }
}
