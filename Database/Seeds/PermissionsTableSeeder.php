<?php

namespace Raffles\Modules\Linkre\Database\Seeds;

use Caffeinated\Shinobi\Models\{ Permission, Role };
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'Ver Noticia', 'slug' => 'view-article'],
            ['name' => 'Crear Noticia', 'slug' => 'create-article'],
            ['name' => 'Actualizar Noticia', 'slug' => 'update-article'],
            ['name' => 'Borrar Noticia', 'slug' => 'delete-article'],
            ['name' => 'Restaurar Noticia', 'slug' => 'restore-article'],

            ['name' => 'Ver Constructora', 'slug' => 'view-company'],
            ['name' => 'Crear Constructora', 'slug' => 'create-company'],
            ['name' => 'Actualizar Constructora', 'slug' => 'update-company'],
            ['name' => 'Borrar Constructora', 'slug' => 'delete-company'],
            ['name' => 'Restaurar Constructora', 'slug' => 'restore-company'],

            ['name' => 'Ver Desarrolladora', 'slug' => 'view-developer'],
            ['name' => 'Crear Desarrolladora', 'slug' => 'create-developer'],
            ['name' => 'Actualizar Desarrolladora', 'slug' => 'update-developer'],
            ['name' => 'Borrar Desarrolladora', 'slug' => 'delete-developer'],
            ['name' => 'Restaurar Desarrolladora', 'slug' => 'restore-developer'],

            ['name' => 'Ver Documento', 'slug' => 'view-document'],
            ['name' => 'Crear Documento', 'slug' => 'create-document'],
            ['name' => 'Actualizar Documento', 'slug' => 'update-document'],
            ['name' => 'Borrar Documento', 'slug' => 'delete-document'],
            ['name' => 'Restaurar Documento', 'slug' => 'restore-document'],

            ['name' => 'Ver Proyecto', 'slug' => 'view-investment'],
            ['name' => 'Crear Proyecto', 'slug' => 'create-investment'],
            ['name' => 'Actualizar Proyecto', 'slug' => 'update-investment'],
            ['name' => 'Borrar Proyecto', 'slug' => 'delete-investment'],
            ['name' => 'Restaurar Proyecto', 'slug' => 'restore-investment'],

            ['name' => 'Ver Inversor', 'slug' => 'view-investor'],
            ['name' => 'Crear Inversor', 'slug' => 'create-investor'],
            ['name' => 'Actualizar Inversor', 'slug' => 'update-investor'],
            ['name' => 'Borrar Inversor', 'slug' => 'delete-investor'],
            ['name' => 'Restaurar Inversor', 'slug' => 'restore-investor'],

            ['name' => 'Ver Promotor', 'slug' => 'view-promoter'],
            ['name' => 'Crear Promotor', 'slug' => 'create-promoter'],
            ['name' => 'Actualizar Promotor', 'slug' => 'update-promoter'],
            ['name' => 'Borrar Promotor', 'slug' => 'delete-promoter'],
            ['name' => 'Restaurar Promotor', 'slug' => 'restore-promoter'],

            ['name' => 'Ver Informe', 'slug' => 'view-report'],
            ['name' => 'Crear Informe', 'slug' => 'create-report'],
            ['name' => 'Actualizar Informe', 'slug' => 'update-report'],
            ['name' => 'Borrar Informe', 'slug' => 'delete-report'],
            ['name' => 'Restaurar Informe', 'slug' => 'restore-report']
        ];

        foreach ($permissions as $permission) Permission::create($permission);

        $role = Role::where('slug', 'colaborador')->first();
        $role->permissions()->attach([1,2,6,7,11,16,17,21,22,26,31,32,36,37]);
    }
}
