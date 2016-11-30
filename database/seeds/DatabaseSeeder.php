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
        factory(App\Models\Achievement::class, 35)->create();
        $this->call(UsersHasAchievementTableSeeder::class);


//         factory(App\Models\Achievement::class, 35)->create();
//         factory(App\Models\PrivacyLevel::class, 10)->create();
//         factory(App\Models\School::class, 10)->create();
//         factory(App\Models\Action::class, 100)->create();
//         factory(App\Models\Role::class, 10)->create();
////         factory(App\Models\RolesHasPrivacyLevel::class, 10)->create();
//         factory(App\Models\User::class, 450)->create();
////         factory(App\Models\RolesHasAction::class, 10)->create();
//         factory(App\Models\Company::class, 50)->create();
////         factory(App\Models\UsersHasAction::class, 10)->create();
//         factory(App\Models\Person::class, 350)->create();
//         factory(App\Models\Certificate::class, 150)->create();
////         factory(App\Models\UsersHasAchievement::class, 10)->create();
//         factory(App\Models\UsersInformation::class, 450)->create();
//         factory(App\Models\Job::class, 160)->create();
//         factory(App\Models\Diploma::class, 450)->create();



    }
}
