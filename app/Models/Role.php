<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function validator($input){
        return Validator::make($input,[
            'name'=>'required '
        ]);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permissions', 'role_id', 'permission_id');
    }
    public function modules()
    {
        return $this->belongsToMany(Module::class,'role_modules', 'role_id', 'module_id');
    }

}
