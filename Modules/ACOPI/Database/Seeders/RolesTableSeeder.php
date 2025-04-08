<?php

namespace Modules\ACOPI\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\SICA\Entities\App;
use Modules\SICA\Entities\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $app = App::where('name', 'ACOPI')->firstOrFail();

        $roladmin = Role::updateOrCreate(['slug' => 'acopi.admin'], [
            'name' => 'Administrador',
            'description' => 'Rol administrador de la aplicación ACOPI',
            'description_english' => 'ACOPI application administrator role',
            'full_access' => 'No',
            'app_id' => $app->id
        ]);

        $useradministrador = User::where('nickname', 'Jlemus')->firstOrFail();

        $useradministrador->roles()->syncWithoutDetaching([$roladmin->id]);}
}