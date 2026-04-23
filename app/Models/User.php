<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable implements MustVerifyEmail {
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
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

  public function pots(){
        return $this->hasMany(Post::class, 'creator_id');
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

