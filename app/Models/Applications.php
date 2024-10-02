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
        'resume',
        'cover_letter',
        'application_status',
        'applied_at',
    ];
    public function validator($input){
        return Validator::make($input,[
            'job_id'=>'required ',
            'seeker_id'=>'required ',
            'resume'=>'required|file|mimes:pdf,doc,docx',
            'portfolio'=>'required  ',
            'cover_letter'=>'required ',
            'application_status'=>'required ',
        ]);
    }
    public function job()
    {
        return $this->belongsTo(JobPostModel::class, 'job_id', 'id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(Seeker::class, 'seeker_id', 'id');
    }
}
