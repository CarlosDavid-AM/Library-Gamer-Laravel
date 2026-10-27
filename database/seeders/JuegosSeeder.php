<?php

namespace Database\Seeders;

use App\Models\Juegos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Juegos::factory()->count(10)->create();
    }
}
