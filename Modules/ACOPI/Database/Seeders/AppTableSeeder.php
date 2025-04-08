<?php

namespace Modules\ACOPI\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\SICA\Entities\App;


class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $app = App::updateOrCreate(['name' => 'ACOPI'], [
            'url' => '/acopi/index',
            'color' => '#76250C',
            'icon' => 'fas fa-mug-hot',
            'description' => 'Registro de ventas en Estación de Café del CEFA',
            'description_english' => 'Sales record at CEFA Coffee Station'
        ]);

    }
}
