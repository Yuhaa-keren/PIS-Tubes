<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
        'batch',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function schedulesAsUser1()
    {
        return $this->hasMany(Schedule::class, 'user1_id');
    }

    public function schedulesAsUser2()
    {
        return $this->hasMany(Schedule::class, 'user2_id');
    }

    public function schedules()
    {
        return $this->schedulesAsUser1()->union($this->schedulesAsUser2());
    }

    public function getIsAdminAttribute()
    {
        return $this->attributes['role'] === 'admin';
    }
}