<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Xuxemon;

/**
 * Class xuxemonsSeeder
 * @package Database\Seeders
 */
class xuxemonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the Xuxemons you want to seed
        $xuxemonData = [
            ['Apleki', 'Tierra'],
            ['Avecrem', 'Aire'],
            ['Bambino', 'Tierra'],
            ['Beeboo', 'Aire'],
            ['Boo-hoot', 'Aire'],
            ['Cabrales', 'Tierra'],
            ['Catua', 'Aire'],
            ['Catyuska', 'Aire'],
            ['Chapapá', 'Agua'],
            ['Chopper', 'Tierra'],
            ['Cuellilargui', 'Tierra'],
            ['Deskangoo', 'Tierra'],
            ['Doflamingo', 'Aire'],
            ['Dolly', 'Tierra'],
            ['Elconchudo', 'Agua'],
            ['Eldientes', 'Agua'],
            ['Elgominas', 'Tierra'],
            ['Flipper', 'Agua'],
            ['Floppi', 'Tierra'],
            ['Horseluis', 'Agua'],
            ['Krokolisko', 'Agua'],
            ['Kurama', 'Tierra'],
            ['Ladybug', 'Aire'],
            ['Lengualargui', 'Tierra'],
            ['Medusation', 'Agua'],
            ['Meekmeek', 'Tierra'],
            ['Megalo', 'Agua'],
            ['Mocha', 'Agua'],
            ['Murcimurci', 'Aire'],
            ['Nemo', 'Agua'],
            ['Oinkcelot', 'Tierra'],
            ['Oreo', 'Tierra'],
            ['Otto', 'Tierra'],
            ['Pinchimott', 'Agua'],
            ['Pollis', 'Aire'],
            ['Posón', 'Aire'],
            ['Quakko', 'Agua'],
            ['Rajoy', 'Aire'],
            ['Rawlion', 'Tierra'],
            ['Rexxo', 'Tierra'],
            ['Ron', 'Tierra'],
            ['Sesssi', 'Tierra'],
            ['Shelly', 'Agua'],
            ['Sirucco', 'Aire'],
            ['Torcas', 'Agua'],
            ['Trompeta', 'Aire'],
            ['Trompi', 'Tierra'],
            ['Tux', 'Agua'],
        ];

        // Loop through the array and create Xuxemon instances
        foreach ($xuxemonData as [$name, $type]) {
            Xuxemon::create([
                'name' => $name,
                'type' => $type,
                'hp' => 100,
                'evo1' => 3,
                'evo2' => 5,
            ]);
        }
    }
}
