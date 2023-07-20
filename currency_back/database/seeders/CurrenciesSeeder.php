<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    public function run()
    {
        // Vérifiez si la devise avec le code 'EUR' existe déjà
        $currency = Currency::where('code', 'EUR')->first();

        // Si la devise n'existe pas, alors on la crée
        if (!$currency) {
            Currency::create([
                'name' => 'Euro',
                'code' => 'EUR',
            ]);
        }

        // Vérifiez si la devise avec le code 'USD' existe déjà
        $currency = Currency::where('code', 'USD')->first();

        // Si la devise n'existe pas, alors on la crée
        if (!$currency) {
            Currency::create([
                'name' => 'United States Dollar',
                'code' => 'USD',
            ]);
        }
    }
}
