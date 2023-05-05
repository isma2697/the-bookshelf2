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
        // Get a random user
        $user = User::inRandomOrder()->first();

        // Find a book that the user hasn't bookmarked
        $book = Books::whereNotIn('id', function ($query) use ($user) {
            $query->select('books_id')
                ->from('bookmarks')
                ->where('users_id', $user->id);
        })->inRandomOrder()->first();

        // Check if the record already exists in the 'bookmarks' table
        $existingBookmark = Bookmark::where('users_id', $user->id)->where('books_id', $book->id)->exists();

        if ($existingBookmark) {
            // If the record already exists, do nothing
            return [];
        } else {
            return [
                'users_id' => $user->id,
                'books_id' => $book->id,
            ];
        }
    }
}
