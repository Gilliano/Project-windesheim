<?php

use Illuminate\Database\Seeder;

class UsersHasAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 5)->create()->each(function ($u) {
            $u->achievement()->sync(App\Models\Achievement::all()->random(5));
        });

    }
}
