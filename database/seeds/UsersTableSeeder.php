<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'email' => 'pascalvanegmond@hotmail.com',
            'password' => bcrypt('Test123.'),
            'role_id' => '1',
        ));

        User::create(array(
            'email' => 'anotherfakeone@live.nl',
            'password' => bcrypt('Test123.'),
            'role_id' => '1',
        ));

        User::create(array(
            'email' => 'arjenschrijer@gmail.com',
            'password' => bcrypt('Test123.'),
            'role_id' => '1',
        ));

        User::create(array(
            'email' => 'gillianoherkul@hotmail.com',
            'password' => bcrypt('Test123.'),
            'role_id' => '1',
        ));
    }



}
