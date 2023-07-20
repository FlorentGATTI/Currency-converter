<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;
use App\Models\Pair;

class PairsSeeder extends Seeder
{
    public function run()
    {
        // Vérifiez si la paire de devises avec les codes 'EUR' et 'USD' existe déjà
        $currencyFrom = Currency::where('code', 'EUR')->first();
        $currencyTo = Currency::where('code', 'USD')->first();

        // Si la paire de devises n'existe pas, alors on la crée
        if (!$currencyFrom || !$currencyTo) {
            $this->command->info('Veuillez exécuter le seeder CurrenciesSeeder avant le seeder PairsSeeder.');
            return;
        }

        $pair = Pair::create([
            'currency_from' => $currencyFrom->id,
            'currency_to' => $currencyTo->id,
            'rate' => 1.23, // Remplacez cette valeur par le taux réel si nécessaire
        ]);
        $pair2 = Pair::create([
            'currency_from' => $currencyTo->id,
            'currency_to' => $currencyFrom->id,
            'rate' => 0.77, // Remplacez cette valeur par le taux réel si nécessaire
        ]);
        
    }
}
