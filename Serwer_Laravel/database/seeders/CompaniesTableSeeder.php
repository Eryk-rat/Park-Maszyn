<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tworzenie kilku przykładowych firm
        Company::create([
            'name' => 'Firma A',
            'address' => 'ul. Przykładowa 1',
            // ...
        ]);

        Company::create([
            'name' => 'Firma B',
            'address' => 'ul. Przykładowa 2',
            // ...
        ]);

    }
}
