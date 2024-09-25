<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'seeker_id',
        'employer_id',
        'interview_date',
        'interview_time',
        'interview_status',
    ];

    public function job()
    {
        return $this->belongsTo(JobPostModel::class, 'id', 'job_id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeekers::class, 'id', 'seeker_id');
    }

    public function employer()
    {
        return $this->belongsTo(Employers::class, 'id', 'employer_id');
    }
}
