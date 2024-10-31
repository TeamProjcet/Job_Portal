<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';
    protected $fillable = ['title', 'description', 'status','slide_image'];

    // Validation method
    public function validator($input)
    {
        return Validator::make($input,[
            'title' => 'required',
            'description' => 'required',
            'status'=>'',
            'slide_image' => 'required',
        ]);
    }
}
