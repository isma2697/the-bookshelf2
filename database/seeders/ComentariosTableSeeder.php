<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Database\Factories\ComentarioFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    public function run()
    {
        Comentario::factory(50)->create();
    }
}