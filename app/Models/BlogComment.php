<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'seeker_id',
        'blog_id',
        'comments',
    ];
    public function validator($input){
        return Validator::make($input,[
            'seeker_id'=>'required ',
            'blog_id'=>'required ',
            'comments'=>'required ',
        ]);
    }

    public function seeker(){
        return $this->belongsTo(Seeker::class,'seeker_id','id' );
    }

    public function blog(){
        return $this->belongsTo(blog::class,'blog_id','id');
    }
}
