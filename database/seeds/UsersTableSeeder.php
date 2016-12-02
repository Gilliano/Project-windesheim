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
//            $u->getRole()->sync(factory(App\Models\Role::all()));
//        });



//        factory(App\Role::class, 10)->create();
//
//        factory(App\User::class, 50)->create()->each(function($bar) {
//            $bar->foobars()->sync(
//                App\Foo::all()->random(3)
//            );
//        });
//
        factory(App\Models\User::class, 10)->create();
    }



}
