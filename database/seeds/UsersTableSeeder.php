<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\Models\User::class, 5)->create()->each(function ($u) {
//            $u->getRole()->save(factory(App\Models\Role::class)->make());
//        });

        factory(App\Models\User::class, 10)->create();
    }



}
