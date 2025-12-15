<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class);
    }
}