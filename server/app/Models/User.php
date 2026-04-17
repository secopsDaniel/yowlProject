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

     public function hasVerifiedEmail(): bool
    {
        return $this-> verified_at !== null;
    }


 public function markEmailAsVerified(): bool
    {
        return $this->forceFill([
            'verified_at' => now(),
            'is_verified' => true
        ])->save();
    }
    protected function casts(): array
    {
        return [
            'verified_at' => 'datetime',
            'is_verified' => 'boolean',
            'password' => 'hashed',
            'birthday' => 'date',
        ];
    }
}

