<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'seeker_id',
        'application_status',
        'applied_at',
    ];

    public function job()
    {
        return $this->belongsTo(JobPostModel::class, 'job_id', 'id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeekers::class, 'seeker_id', 'id');
    }
}
