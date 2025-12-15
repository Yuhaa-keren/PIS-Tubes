<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Warning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'title',
        'description',
        'level',
        'expires_at',
        'status',
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        'admin_id',
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        return $this->belongsTo(User::class, 'admin_id');
    }
=======
        return $this->belongsTo(User::class, 'admin_id');}

>>>>>>> Stashed changes
=======
        return $this->belongsTo(User::class, 'admin_id');}

>>>>>>> Stashed changes
=======
        return $this->belongsTo(User::class, 'admin_id');}

>>>>>>> Stashed changes
=======
        return $this->belongsTo(User::class, 'admin_id');}

>>>>>>> Stashed changes
=======
        return $this->belongsTo(User::class, 'admin_id');}

>>>>>>> Stashed changes
}