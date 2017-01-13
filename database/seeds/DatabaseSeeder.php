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
        if(count(App\Models\ZipInfo::all()) == 0)
            $this->call(ZipInfoTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        factory(App\Models\User::class, 450)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(PrivacyLevelTableSeeder::class);
        $this->call(PersonsTableSeeder::class);

        App\Models\User::all()->each(function ($user){
            factory(App\Models\UserInformation::class, 1)->create(['user_id' => $user->id]);
        });

        factory(App\Models\Achievement::class, 30)->create()->each(function ($achievement) {
            $achievement->users()->sync(App\Models\User::all()->random(5));
        });

        App\Models\Action::all()->each(function ($action) {
            $action->roles()->sync(App\Models\Role::all()->random(5));
            $action->users()->sync(App\Models\User::all()->random(5));
        });

        $this->call(WindesheimInSchoolSeeder::class);
        factory(App\Models\School::class, 10)->create();
        $this->call(EducationsCollectionSeeder::class);
        factory(App\Models\Education::class, 9)->create();
        factory(App\Models\Group::class, 20)->create();
        factory(App\Models\Company::class, 50)->create();
        factory(App\Models\Person::class, 350)->create();
        factory(App\Models\Certificate::class, 150)->create();
        factory(App\Models\Job::class, 230)->create();
        factory(App\Models\Diploma::class, 450)->create();

        $this->call(PersonHasGroupSeeder::class);

        App\Models\Person::all()->take(4)->each(function ($person) {
            $person->group()->attach(App\Models\Group::where('name', 'ADSD')->get(), ['minor' => null]);
        });

        factory(App\Models\Survey::class, 10)->create()->each(function ($survey) {
            $survey->persons()->attach(App\Models\Person::all()->random(5), ['rating' => rand(1, 5), 'comment' => 'lala']);
        });

        factory(App\Models\Question::class, 30)->create()->each(function ($question) {
            $question->persons()->attach(App\Models\Person::all()->random(5), ['answer' => rand(1, 5), 'optional' => 'lala']);
        });

        App\Models\Person::all()->random(200)->each(function ($person){
            $person->group()->attach(App\Models\Group::all()->random(1), ['minor' => 'minor']);
        });

        App\Models\Education::all()->each(function ($Education){
            $educations = $Education->groups()->has('person')->with('person')->get()->toArray();
            foreach ($educations as $education){
                foreach ($education as $persons){
                    if( $persons[0] > 11){
                        foreach ($persons as $person){
                            $Education->personsRating()->attach($person['id'], ['rating' => rand(1, 5), 'comment' => 'lala']);
                        }
                    }
                }
            }
        });

    }
}
