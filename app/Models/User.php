<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'password', 'user_role', 'is_active',
        'reset_password_token', 'phone', 'token'
    ];
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}