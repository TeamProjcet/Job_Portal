<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'salary', 'company', 'address', 'job_type', 'details', 'date_time', 'image',
    ];
}
