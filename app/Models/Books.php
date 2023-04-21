<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'subtitle',
        'published_date',
        'page_count',
        'description',
        'authors',
        'categories',
        'thumbnail',
        'identifier'
    ];

    protected $casts = [
        'authors' => 'json',
        'categories' => 'json'
    ];

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    
    

}
