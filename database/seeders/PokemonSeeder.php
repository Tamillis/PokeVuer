<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //pull the desired data and feed it into the 'Pokemon' local database
        //pokeapi has been referenced to manually pull the data out, as only used data is kept to keep the database table from being bloated
        //otherwise a full scrape and copy could have been done (but why do that?)
        $url = "https://pokeapi.co/api/v2/pokemon?limit=151";
        $pokemon_data = json_decode(file_get_contents($url));

        foreach($pokemon_data->results as $result) {
            $nextPokemon = json_decode(file_get_contents($result->url));
            
            DB::table('pokemon')->insert([
                'name' => $nextPokemon->name,
                'spriteUrl' => $nextPokemon->sprites->front_default,
                'created_at' => now(),
            ]);
        }
    }
}
