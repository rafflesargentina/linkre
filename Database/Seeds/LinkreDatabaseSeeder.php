<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Illuminate\Database\Seeder;

class LinkreDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(PromotersTableSeeder::class);
        $this->call(InvestmentPreferencesTableSeeder::class);
        $this->call(InvestmentTypesTableSeeder::class);
        $this->call(InvestmentValuesTableSeeder::class);
        $this->call(InvestmentsTableSeeder::class);
        $this->call(InvestorTypesTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
