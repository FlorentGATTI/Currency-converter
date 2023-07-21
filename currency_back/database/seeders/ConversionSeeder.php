<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversion;

class ConversionSeeder extends Seeder
{
    public function run()
    {
        // Insérez les données pour la table Conversion
        Conversion::create([
            'pair_id' => 1,
            'count' => 53,
        ]);

        Conversion::create([
            'pair_id' => 2,
            'count' => 25,
        ]);
    }
}


