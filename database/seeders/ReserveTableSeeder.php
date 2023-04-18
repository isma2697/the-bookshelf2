<?php

namespace Database\Seeders;

use App\Models\Reserve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReserveTableSeeder extends Seeder
{
    public function run()
    {
        Reserve ::factory(50)->create();
    }
}