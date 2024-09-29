<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyReviews extends Model
{
    use HasFactory;
    protected $table = 'company_reviews';

    protected $fillable = [
        'employer_id',
        'seeker_id',
        'rating',
        'review_content',
        'review_date',
    ];

    public function employer()
    {
        return $this->belongsTo(Employers::class, 'employer_id', 'id');
    }

    public function seeker()
    {
        return $this->belongsTo(JobSeekers::class, 'seeker_id', 'id');
    }
}
