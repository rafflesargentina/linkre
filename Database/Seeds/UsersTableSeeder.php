<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Raffles\Modules\Linkre\Models\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['first_name' => 'Mario', 'last_name' => 'Patronelli', 'email' => 'mario@raffles.com.ar', 'document_type_id' => '1', 'document_number' => '32999611', 'password' => str_random()]);
        $user->roles()->attach(1);

        $user = User::create(['first_name' => 'Rubén', 'last_name' => 'Frattini', 'email' => 'rfrattini@icloud.com', 'document_type_id' => '1', 'document_number' => '16401743', 'password' => str_random()]);
        $user->roles()->attach(1);
    }
}
