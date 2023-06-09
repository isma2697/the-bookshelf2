<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['books_id', 'users_id'];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

 

    public function books()
    {
        return $this->belongsTo(Books::class);
    }

}
