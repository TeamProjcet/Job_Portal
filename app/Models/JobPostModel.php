<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JobPostModel extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id', 'vacancy',  'category_id','position', 'salary', 'company_id', 'address', 'job_type', 'details', 'date_time', 'image', 'status',
    ];

    public function validator($input){
        return Validator::make($input,[
            'category_id'=>'required ',
            'position'=>'required ',
            'salary'=>' ',
            'company_id'=>'required ',
            'vacancy'=>'required ',
            'address'=>'required ',
            'job_type'=>'required ',
            'details'=>'required ',
            'date_time'=>'required ',
            'image'=>'required',
            'status'=>'boolean',
        ]);
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function seeker(){
        return $this->hasOne(Seeker::class);
    }


    public function applications()
    {
        return $this->hasMany(Applications::class);
    }


}
