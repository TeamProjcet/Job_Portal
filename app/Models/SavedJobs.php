<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'seeker_id',
        'job_id',
        'saved_at',
    ];

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeekers::class, 'id', 'seeker_id');
    }

    public function job()
    {
        return $this->belongsTo(JobPostModel::class, 'id', 'job_id');
    }
}
