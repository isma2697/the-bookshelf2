<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'books_id',
        'fecha_reserva',
        'fecha_vencimiento',
    ];


    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public function books()
    {
        return $this->belongsTo(Books::class);
    }
    
}
