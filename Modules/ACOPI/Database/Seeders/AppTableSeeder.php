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
            'color' => '#0cab05',
            'icon' => 'fas fa-box-open',
            'description' => 'Sistemas de Gestión Centro de Acopio',
            'description_english' => 'Management Systems Coffee Collection Center',
          
        ]);

    }
}
