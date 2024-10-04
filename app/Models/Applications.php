<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Applications extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'seeker_id',
        'image',
        'coverLetter',
        'portfolio',
    ];
    public function validator($input){
        return Validator::make($input,[
            'job_id'=>'required ',
            'seeker_id' => 'required|unique:seekers,seeker_id',
            'image'=>'required',
            'portfolio'=>'required  ',
            'coverLetter'=>'required ',
        ]);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }

    public function job()
    {
        return $this->belongsTo(JobPostModel::class, 'job_id','id');
    }


    public function seeker()
    {
        return $this->belongsTo(Seeker::class, 'seeker_id','id');
    }
}
