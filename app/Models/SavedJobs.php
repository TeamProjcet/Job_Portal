<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class SavedJobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'seeker_id',
        'job_id',
        'saved_at',
    ];
    public function validator($input){
        return Validator::make($input,[
            'job_id'=>'required ',
            'seeker_id' => 'required',
        ]);
    }
    public function seeker()
    {
        return $this->belongsTo(Seeker::class,'seeker_id','id');
    }
//    public function job()
//    {
//        return $this->belongsTo(JobPostModel::class, 'job_id','id');
//    }
}
