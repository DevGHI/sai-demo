<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Department::factory(2)->has(Position::factory()->count(3))->create();
        Department::factory(10)
        ->has(Position::factory()->count(3))
        ->create();
        // Position::factory(100)->create();
        // Department::factory(2)
        // ->hasPositions(3)
        // ->create();
    }
}
