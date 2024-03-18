<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\ItemEffect;
use App\Models\Effect;
use App\Models\SubjectEffect;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        // Create the subject_effect for the "Heal" effect and associate it
        $healSubjectEffect = SubjectEffect::create([
            'table_name' => 'pcs',
            'column_name' => 'hp_remaining',
        ]);
         // Create the "Heal" effect
         $healEffect = Effect::create([
            'name' => 'Heal',
            'field' => 1,
        ]);
        
        // Create small potion
        $smallPotion = Item::create([
            'name' => 'Small Potion',
            'file' => 'small_potion.png',
            'prize' => 50,
            'description' => 'A small healing potion',
            'type' => 'potion',
        ]);

        // Create medium potion
        $mediumPotion = Item::create([
            'name' => 'Medium Potion',
            'file' => 'medium_potion.png',
            'prize' => 100,
            'description' => 'A medium healing potion',
            'type' => 'potion',
        ]);

        // Create extra-large potion
        $extraLargePotion = Item::create([
            'name' => 'Extra-Large Potion',
            'file' => 'extra_large_potion.png',
            'prize' => 250,
            'description' => 'An extra-large healing potion',
            'type' => 'potion',
        ]);

        // Define the heal effect
        $healEffectId = 1; // Assuming the heal effect already exists in the effects table with ID 1

        // Attach the heal effect to the potions
        ItemEffect::create([
            'id_item' => $smallPotion->id,
            'id_effect' => $healEffectId,
            'mod' => 10, // Adjust the healing amount as needed
        ]);

        ItemEffect::create([
            'id_item' => $mediumPotion->id,
            'id_effect' => $healEffectId,
            'mod' => 20, // Adjust the healing amount as needed
        ]);

        ItemEffect::create([
            'id_item' => $extraLargePotion->id,
            'id_effect' => $healEffectId,
            'mod' => 50, // Adjust the healing amount as needed
        ]);
    }
}
