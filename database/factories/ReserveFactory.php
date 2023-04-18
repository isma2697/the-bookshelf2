<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserve>
 */
class ReserveFactory extends Factory
{
    protected $model = Reserve::class;

    public function definition()
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'books_id' => Books::inRandomOrder()->first()->id,
            'fecha_reserva' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}