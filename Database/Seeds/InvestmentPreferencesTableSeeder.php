<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Illuminate\Database\Seeder;

use Raffles\Modules\Linkre\Models\InvestmentPreference;

class InvestmentPreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preferences = [
            'Uso Mixto',
            'Proyectos Comerciales', 
            'Comercio Minorista/Grandes',
            'Superficies Comerciales',
            'Oficinas',
            'Vivienda',
            'Parking',
            'Hospitalidad',
            'Tierra',
            'Almacenamiento',
            'Otros',
        ];

        foreach ($preferences as $preference) {
            InvestmentPreference::create(['name' => $preference]);
        }
    }
}
