<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class PartnershipModel extends Model
{
    use HasFactory;
    protected $table = 'partnerships';
    protected $fillable = ['partnership', 'logo'];
    public function validator($input){
        return Validator::make($input, [
            'partnership' => 'required',
            'logo' => 'required'
        ]);
    }
}
