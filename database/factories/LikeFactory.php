<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

use App\Models\Like;
use App\Models\Users;
use App\Models\Books;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    protected $model = Like::class;

    // The definition method defines how the Like objects should be created.
    public function definition()
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'books_id' => Books::inRandomOrder()->first()->id,
        ];
    }
}