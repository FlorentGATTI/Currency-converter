<?php

namespace Database\Seeders;

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
        $this->call([
            CurrenciesSeeder::class,
            PairsSeeder::class,
            ConversionSeeder::class,
            AdminSeeder::class, // Ajout du seeder AdminSeeder pour créer l'utilisateur administrateur
        ]);
    }
}
