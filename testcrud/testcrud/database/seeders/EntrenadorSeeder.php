<?php

namespace Database\Seeders;

use App\Models\Entrenador;
use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrenadorSeeder extends Seeder
{
    /**
     * Crear entrenadores
     */
    public function run(): void
    {
        $entrenadorData = [
            [
                'idEntrenador' => '000001',
                'nombre' => 'Sandra',
                'fechaN' => date_create_from_format('d-m-Y','13-12-1988'),
                'ciudad' => 'Pueblo Paleta',
            ],
            [
                'idEntrenador' => '000002',
                'nombre' => 'Gary',
                'fechaN' => date_create_from_format('d-m-Y','12-01-1993'),
                'ciudad' => 'Azulona',
            ],
            [
                'idEntrenador' => '123123',
                'nombre' => 'Azul',
                'fechaN' => date_create_from_format('d-m-Y','02-05-1990'),
                'ciudad' => 'Isla Canela',
            ],
        ];

        // Insert the data into the database
        foreach ($entrenadorData as $data) {
            Entrenador::create($data);
        }
    }
}
