<?php

namespace Database\Factories;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\Books;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookmark>
 */
class BookmarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Bookmark::class;

    public function definition()
    {
        // Obtén un usuario aleatorio
        $user = User::inRandomOrder()->first();
        // Encuentra un libro que el usuario no haya marcado
        $book = Books::whereDoesntHave('bookmarks', function ($query) use ($user) {
            $query->where('users_id', $user->id);
        })->inRandomOrder()->first();
        return [
            'users_id' => $user->id,
            'books_id' => $book->id,
        ];
    }
}
