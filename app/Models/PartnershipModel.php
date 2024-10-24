<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PartnershipModel extends Model
{
    use HasFactory;
    protected $table = 'partnerships';
    protected $fillable = ['name', 'logo','weblink'];


    public function validator($input){
        return Validator::make($input, [
            'name' => 'required',
            'weblink' => 'required',
            'logo' => 'required'
        ]);
    }
}
