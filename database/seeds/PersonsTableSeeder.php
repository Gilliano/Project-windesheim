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
            'birthday' => '1991-01-10',
            'sex' => 1,
            'user_id' => 451,
            'privacy_level_id' => '1',
        ));

        Person::create(array(
            'firstname' => 'Gerben',
            'lastname' => 'Tesselaar',
            'birthday' => '1993-05-20',
            'sex' => 1,
            'user_id' => 452,
            'privacy_level_id' => '1',
        ));

        Person::create(array(
            'firstname' => 'Arjen',
            'lastname' => 'Schrijer',
            'birthday' => '1997-06-10',
            'sex' => 1,
            'user_id' => 453,
            'privacy_level_id' => '1',
        ));

        Person::create(array(
            'firstname' => 'Gilliano',
            'lastname' => 'Herkul',
            'birthday' => '1995-10-31',
            'sex' => 1,
            'user_id' => 454,
            'privacy_level_id' => '1',
        ));
    }
}
