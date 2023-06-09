<?php

namespace Database\Factories;

use App\Models\Books;
use App\Models\Reserve;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reserve>
 */
class ReserveFactory extends Factory
{
    protected $model = Reserve::class;

    // The definition method defines how the reserve objects should be created.
    public function definition()
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'books_id' => Books::inRandomOrder()->first()->id,
            'fecha_reserva' => Carbon::now(),
            'fecha_vencimiento' => Carbon::now()->addDays(7),
        ];
    }
}