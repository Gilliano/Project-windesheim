<?php

use Illuminate\Database\Seeder;
use App\Models\Person;

class PersonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create(array(
            'firstname' => 'Pascal',
            'lastname' => 'van Egmond',
            'user_id' => 451,
            'privacy_level_id' => '1',
            'group_id' => null,
        ));

        Person::create(array(
            'firstname' => 'Gerben',
            'lastname' => 'Tesselaar',
            'user_id' => 452,
            'privacy_level_id' => '1',
            'group_id' => null,
        ));

        Person::create(array(
            'firstname' => 'Arjun',
            'lastname' => 'Schrijer',
            'user_id' => 453,
            'privacy_level_id' => '1',
            'group_id' => null,
        ));

        Person::create(array(
            'firstname' => 'Gilliano',
            'lastname' => 'Herkul',
            'user_id' => 454,
            'privacy_level_id' => '1',
            'group_id' => null,
        ));
    }
}
