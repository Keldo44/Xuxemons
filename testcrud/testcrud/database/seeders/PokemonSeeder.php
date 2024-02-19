<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //datos que se crean al hacer seed
        $pokemonData = [
            [
                'mote' => 'Tortuga',
                'nombre' => 'Squirtle',
                'tipo' => 'agua',
                'tamanio' => 'pequeño',
                'idEntrenador' => '000001',
                'peso' => 0.500,
            ],
            [
                'mote' => 'Lagarto',
                'nombre' => 'Charmander',
                'tipo' => 'fuego',
                'tamanio' => 'pequeño',
                'idEntrenador' => '000001',
                'peso' => 0.500,
            ],
            [
                'mote' => 'Maceta',
                'nombre' => 'Bulbasaur',
                'tipo' => 'planta',
                'tamanio' => 'pequeño',
                'idEntrenador' => '123123',
                'peso' => 0.500,
            ],
        ];

        // Insert the data into the database
        foreach ($pokemonData as $data) {
            Pokemon::create($data);
        }
    }
}
