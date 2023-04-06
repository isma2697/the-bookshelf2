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

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'book_id' => Books::inRandomOrder()->first()->id,
            'comentario' => $this->faker->text(200),
        ];
    }
}
