<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class InterviewSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'user_id',
        'location',
        'notic',
        'interview_date',
        'interview_time',
    ];
    public function validator($input){
        return Validator::make($input,[
            'job_id'=>'required ',
            'location'=>'required ',
            'notic'=>'required ',
            'interview_date'=>'required ',
        ]);
    }

    public function job()
    {
        return $this->belongsTo(JobPostModel::class );
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
