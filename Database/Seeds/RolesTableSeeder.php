<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Colaborador', 'slug' => 'colaborador']
        ];

        foreach ($roles as $role) Role::create($role);
    }
}
