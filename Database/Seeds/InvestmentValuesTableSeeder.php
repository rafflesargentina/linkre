<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Illuminate\Database\Seeder;

use Raffles\Modules\Linkre\Models\InvestmentValue;

class InvestmentValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investmentValues = [
            'Menos de 1 millón',
            'Entre 1 y 5 millones',
            'Más de 5 millones',
        ];

        foreach ($investmentValues as $investmentValue) {
            InvestmentValue::create(['name' => $investmentValue]);
        }
    }
}
