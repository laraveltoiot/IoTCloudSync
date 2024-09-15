<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bogdy',
            'email' => 'bogdy@bogdy.de',
            'password' => bcrypt('supertest'),
        ]);
        User::factory(10)->create();
    }
}
