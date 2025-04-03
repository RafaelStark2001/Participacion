<?php

namespace Database\Seeders;

use App\Models\Docente;
use App\Models\Seccion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Docente::factory(10)
            ->has(Seccion::factory()->count(3))
            ->create();
    }
}
