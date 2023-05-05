<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Comentario;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */


class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    // The definition method defines how the Comentario objects should be created.
    public function definition()
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'books_id' => Books::inRandomOrder()->first()->id,
            'comentario' => $this->faker->text(200),
        ];
    }
}
