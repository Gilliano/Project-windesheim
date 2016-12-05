<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        factory(App\Models\User::class, 450)->create();
        $this->call(PrivacyLevelTableSeeder::class);

        factory(App\Models\Achievement::class, 30)->create()->each(function ($u) {
            $u->users()->sync(App\Models\User::all()->random(5));
        });

        factory(App\Models\Action::class, 25)->create()->each(function ($u) {
            $u->roles()->sync(App\Models\Role::all()->random(5));
            $u->users()->sync(App\Models\User::all()->random(5));
        });

//        factory(App\Models\PrivacyLevel::class, 5)->create()->each(function ($u) {
//            $u->roles()->sync(App\Models\Role::all()->random(5));
//        });

         factory(App\Models\School::class, 10)->create();
         factory(App\Models\Education::class, 20)->create();
         factory(App\Models\Company::class, 50)->create();
         factory(App\Models\Person::class, 350)->create();
         factory(App\Models\Certificate::class, 150)->create();
         factory(App\Models\Job::class, 160)->create();
         factory(App\Models\Diploma::class, 450)->create();
         factory(App\Models\UsersInformation::class, 400)->create();
    }
}
