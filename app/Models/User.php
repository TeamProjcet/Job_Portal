<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

//    public function validator($input)
//    {
//        return Validator::make($input, [
//            'username' => 'required',
//            'email' => 'required|unique:users,email',
//            'password' => 'required|string|max:20|min:4',
//            'confirm_password' => 'required|string|max:20|min:4|same:password',
//        ]);
//    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function seeker()
    {
        return $this->hasMany(Seeker::class);
    }

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function employer()
    {
        return $this->hasMany(Employers::class);
    }

}
