<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function validator($input){

        return Validator::make($input, [
            'name' => 'required',
        ]);
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_permissions');
    }
}
