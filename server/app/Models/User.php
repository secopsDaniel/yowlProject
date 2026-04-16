<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'firstName',
        'lastName',
        'login',
        'email',
        'password',
        'gender',
        'role',
        'birthday',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getEmailVerifiedAtColumn()
{
    return 'verified_at';
}
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
        ];
    }
}

