<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Seeker extends Authenticatable
{
    use HasFactory,Notifiable, HasApiTokens;
    protected $fillable = [
        'name',
        'email',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function applications()
    {
        return $this->hasMany(Applications::class);
    }

}
