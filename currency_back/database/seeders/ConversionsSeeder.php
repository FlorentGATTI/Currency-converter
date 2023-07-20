<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversions;

class ConversionsSeeder extends Seeder
{
    public function run()
    {
        // Insérez les données pour la table conversions
        Conversions::create([
            'pair_id' => 1,
            'count' => 53,
        ]);

        Conversions::create([
            'pair_id' => 2,
            'count' => 25,
        ]);
    }
}


