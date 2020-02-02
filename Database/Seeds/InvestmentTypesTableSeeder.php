<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Modules\Linkre\Models\InvestmentType;

use Illuminate\Database\Seeder;

class InvestmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investmentTypes = [
            'Invesión de renta fija',
            'Inversión de renta variable',
            'Inversión de upside',
            'Inversión de distressed',
        ];

        foreach ($investmentTypes as $investmentType) {
            InvestmentType::create(['name' => $investmentType]);
        }
    }
}
