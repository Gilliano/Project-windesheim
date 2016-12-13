<?php

use Illuminate\Database\Seeder;
use App\Models\School;

class WindesheimInSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create(array(
            'name' => 'Windesheim Flevoland',
            'description' => 'Hogeschool Windesheim Flevoland',
            'address' => 'Hospitaaldreef',
            'address_number' => '5',
            'city' => 'Almere',
            'zip_code' => '1321RC',
            'telephone_number' => '088 469 6600',
            'email' => 'info@windesheimflevoland.nl',
        ));
    }
}
