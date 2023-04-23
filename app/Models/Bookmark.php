<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'books_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }


    public function books()
    {
        return $this->belongsTo(Books::class);
    }

}




