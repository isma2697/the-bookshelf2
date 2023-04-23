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
        $book = Books::whereNotIn('id', function ($query) use ($user) {
            $query->select('books_id')
                ->from('bookmarks')
                ->where('users_id', $user->id);
        })->inRandomOrder()->first();

        // Verifica si el registro ya existe en la tabla 'bookmarks'
        $existingBookmark = Bookmark::where('users_id', $user->id)->where('books_id', $book->id)->first();

        if ($existingBookmark) {
            // Si el registro ya existe, puede generar un nuevo registro o ignorar la inserción
            return [
                'users_id' => null,
                'books_id' => null,
            ];
        } else {
            return [
                'users_id' => $user->id,
                'books_id' => $book->id,
            ];
        }
    }

}
