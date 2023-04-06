<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservasTableSeeder extends Seeder
{
    public function run()
    {
        Reserva ::factory(50)->create();
    }
}