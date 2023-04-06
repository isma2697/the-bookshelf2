<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Reserva;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserva>
 */
class ReservaFactory extends Factory
{
    protected $model = Reserva::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'book_id' => Books::inRandomOrder()->first()->id,
            'fecha_reserva' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}