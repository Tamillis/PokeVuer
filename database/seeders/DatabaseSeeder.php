<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PokemonSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PokemonSeeder::class
        ]);
    }
}
