<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    
    public function books()
    {
        return $this->belongsTo(Books::class);
    }
}
