<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Database\Factories\PositionFactory;
use Database\Seeders\CompaniesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        $this->call([
            CompaniesTableSeeder::class,
        ]);        
        $this->call([
            PositionSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        $companyA = \App\Models\Company::where('name', 'Firma A')->first();
        $companyB = \App\Models\Company::where('name', 'Firma B')->first();
         \App\Models\User::factory()->create([
             'name' => 'admin',
             'password' => bcrypt('admin123'),
             'email' => 'admin@example.com',
             'position_id' =>1,
             'company_id' => $companyA->id,
         ]);

         \App\Models\User::factory()->create([
            'name' => 'test1',
            'password' => bcrypt('test123'),
            'email' => 'test1@example.com',
            'position_id' =>5,
            'company_id' => $companyB->id,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test2',
            'password' => bcrypt('test123'),
            'email' => 'test2@example.com',
            'position_id' =>5,
            'company_id' => $companyA->id,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'test3',
            'password' => bcrypt('test123'),
            'email' => 'test3@example.com',
            'position_id' =>5,
            'company_id' => $companyB->id,
        ]);


    }
}
