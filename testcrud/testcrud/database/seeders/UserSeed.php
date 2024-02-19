<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'userAdmin',
                'email' => 'ssr@ilerna.com',
                'password' => '1234',
                'role' => 'administrador',
            ],
            [
                'name' => 'normalUser',
                'email' => 'user@ilerna.com',
                'password' => '1234',
                'role' => 'usuario',
            ],
        ];

        // Insert the data into the database
        foreach ($users as $data) {
            User::create($data);
        }
    }
}
