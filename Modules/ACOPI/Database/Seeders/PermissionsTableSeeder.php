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

        // Permisos para Material
        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.create'], [
            'name' => 'Formulario de registro de material',
            'description' => 'Acceso al formulario de registro de material',
            'description_english' => 'Access to material creation form',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.index'], [
            'name' => 'Visualización de materiales',
            'description' => 'Acceso a la vista de materiales',
            'description_english' => 'Access to material index view',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.store'], [
            'name' => 'Registrar material',
            'description' => 'Permite guardar nuevos materiales',
            'description_english' => 'Allows storing materials',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.listas'], [
            'name' => 'Listado de materiales',
            'description' => 'Acceso a la lista de materiales registrados',
            'description_english' => 'Access to the list of registered materials',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.update'], [
            'name' => 'Editar material',
            'description' => 'Permite actualizar datos del material',
            'description_english' => 'Allows updating material data',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        $permission = Permission::updateOrCreate(['slug' => 'acopi.admin.material.destroy'], [
            'name' => 'Eliminar material',
            'description' => 'Permite eliminar materiales del sistema',
            'description_english' => 'Allows deleting materials from the system',
            'app_id' => $app->id
        ]);
        $permissions_admin[] = $permission->id;

        // Buscar el rol de administrador
        $rol_admin = Role::where('slug', 'acopi.admin')->first();

        // Asignar permisos al rol sin eliminar los existentes
        $rol_admin->permissions()->syncWithoutDetaching($permissions_admin);
    }
}
