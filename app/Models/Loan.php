<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id', 
        'books_id', 
        'loan_date', 
        'return_date', 
        'due_date'
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
