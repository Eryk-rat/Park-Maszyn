<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Position::create([
            'name' => 'Super admin',
            'permissions' => 1,
        ]);
        Position::create([
            'name' => 'Admin',
            'permissions' => 2,
        ]);
        Position::create([
            'name' => 'Kierownik',
            'permissions' => 3,
        ]);


        Position::create([
            'name' => 'Pracownik',
            'permissions' => 4,
        ]);

        Position::create([
            'name' => 'User',
            'permissions' => 5,
        ]);
    }
    
}
