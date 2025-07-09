<?php

namespace Modules\ACOPI\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\SICA\Entities\App;
use Modules\SICA\Entities\Permission;
use Modules\SICA\Entities\Role;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Lista de permisos que se asignarán al rol administrador
        $permissions_admin = [];

        // Buscar la aplicación ACOPI
        $app = App::where('name', 'ACOPI')->first();

        // Permiso para la vista principal del administrador
        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.welcome'], [
            'name' => 'Acceso al Rol de Administrador',
            'description' => 'Acceso al Rol de Administrador',
            'description_english' => 'Access to the Administrator Role',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        // ---------------- PERMISOS PARA MATERIALES ----------------
        $permissions_materials = [
            'acopi.admin.material.create' => 'Formulario de registro de material',
            'acopi.admin.material.index' => 'Visualización de materiales',
            'acopi.admin.material.store' => 'Registrar material',
            'acopi.admin.material.listas' => 'Listado de materiales',
            'acopi.admin.material.edit' => 'Formulario de edición de material',
            'acopi.admin.material.update' => 'Editar material',
            'acopi.admin.material.destroy' => 'Eliminar material',
        ];

        foreach ($permissions_materials as $slug => $name) {
            $permission = Permission::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'description' => $name,
                'description_english' => 'Access to ' . $slug,
                'app_id' => $app->id
            ]);
            $permissions_admin[] = $permission->id;
        }

        // ---------------- PERMISOS PARA BODEGAS (CELLAR) ----------------
        $permissions_cellar = [
            'acopi.admin.cellar.index' => 'Visualización de bodegas',
            'acopi.admin.cellar.create' => 'Formulario de registro de bodega',
            'acopi.admin.cellar.store' => 'Registrar bodega',
            'acopi.admin.cellar.edit' => 'Formulario de edición de bodega',
            'acopi.admin.cellar.update' => 'Editar bodega',
            'acopi.admin.cellar.destroy' => 'Eliminar bodega',
        ];

        foreach ($permissions_cellar as $slug => $name) {
            $permission = Permission::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'description' => $name,
                'description_english' => 'Access to ' . $slug,
                'app_id' => $app->id
            ]);
            $permissions_admin[] = $permission->id;
        }

        // Asignar todos los permisos al rol administrador al final
        $rol_admin = Role::where('slug', 'acopi.admin')->first();
        $rol_admin->permissions()->syncWithoutDetaching($permissions_admin);
    }
}
