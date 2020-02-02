<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Modules\Linkre\Models\InvestorType;

use Illuminate\Database\Seeder;

class InvestorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investorTypes = [
            'Inversor individual',
            'Grupo de familia',
            'Corporativo',
        ];

        foreach ($investorTypes as $investorType) {
            InvestorType::create(['name' => $investorType]);
        }
    }
}
