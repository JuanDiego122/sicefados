<?php

namespace Modules\ACOPI\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\SICA\Entities\Person;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $person = Person::where('document_number', 1029880898)->first();
        User::updateOrCreate(['nickname' => 'Jlemus'], [
            'person_id' => $person->id,
            'email' => 'juandiegolemusff@gmail.com' //Jule0898
        ]);
        
    }
}
