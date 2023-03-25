<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
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
}
