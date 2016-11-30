<?php
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*
 *   Model Achievement ;
 */
$factory->define(App\Models\Achievement::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'points' => $faker->randomElement($array = array (1, 5, 10, 15, 20)),
    ];
});

/*
 *  Model Action ;
 */
$factory->define(App\Models\Action::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});

/*
 *  Model Certificate  REQUIRES table: users, privacy_levels;
 */
$factory->define(App\Models\Certificate::class, function (Faker\Generator $faker) {

    $user = App\Models\User::orderByRaw('RAND()')->first();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'earned_at' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'valid_until' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->addMonth(), null)),
        'users_id' => $user['id'],
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model Companies  REQUIRES table: users, privacy_levels;
 */
$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {

    $user = App\Models\User::count();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'users_id' => $faker->unique()->numberBetween($min = ($user -99), $max = $user),
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model Diplomas  REQUIRES table: persons, schools;
 */
$factory->define(App\Models\Diploma::class, function (Faker\Generator $faker) {

    $person = App\Models\Person::orderByRaw('RAND()')->first();
    $school = App\Models\School::orderByRaw('RAND()')->first();

    return [
        'cohort_start' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYears(2))),
        'cohort_end' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'graduated_year' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'education' => $faker->text($maxNbChars = 45),
        'education_coordinator' => $faker->randomElement($array = array ($person['id'], null)),
        'education_classcode' => $faker->word,
        'persons_id' => $person['id'],
        'school_id' => $school['id'],
        'school_name' => $faker->name,
    ];
});

/*
 *  Model Jobs  REQUIRES table: persons, privacy_levels;
 */
$factory->define(App\Models\Job::class, function (Faker\Generator $faker) {

    $person = App\Models\Person::orderByRaw('RAND()')->first();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'name' => $faker->word,
        'address' => $faker->streetAddress,
        'address_number' => $faker->buildingNumber,
        'zip_code' => $faker->regexify('[0-9]{4}[A-Z]{2}'),
        'city' => $faker->randomElement($array = array ('almere','lelystad','amsterdam')),
        'function' => $faker->jobTitle,
        'salary_min' => $faker->numberBetween($min = 1000, $max = 10000),
        'salary_max' => $faker->numberBetween($min = 10001, $max = 50000),
        'started_at' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'current_job' => $faker->numberBetween($min = 0, $max = 1),
        'persons_id' => $person['id'],
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model Person  REQUIRES table: users, privacy_levels;
 */
$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {

    $user = App\Models\User::count();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'firstname' => $faker->firstName($gender = null|'male'|'female'),
        'lastname' => $faker->lastName,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'autobiography' => $faker->text($maxNbChars = 200),
        'users_id' => $faker->unique()->numberBetween($min = 1, $max = ($user -100)),
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model PrivacyLevel ;
 */
$factory->define(App\Models\PrivacyLevel::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});

/*
 *  Model Role ;
 */
$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});

/*
 *  Model RoleHasAction REQUIRES table: roles, actions;
 */
$factory->define(App\Models\RolesHasAction::class, function (Faker\Generator $faker) {

    $role = App\Models\Role::orderByRaw('RAND()')->first();
    $action = App\Models\Action::orderByRaw('RAND()')->first();

    return [
        'role_id' => $role['id'],
        'role_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'action_id' => $action['id'],
    ];
});

/*
 *  Model RoleHasPrivacyLevel REQUIRES table: roles, privacy_levels;
 */
$factory->define(App\Models\RolesHasPrivacyLevel::class, function (Faker\Generator $faker) {

    $role = App\Models\Role::orderByRaw('RAND()')->first();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'roles_id' => $role['id'],
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model School ;
 */
$factory->define(App\Models\School::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word,
        'address' => $faker->streetAddress,
        'address_number' => $faker->buildingNumber,
        'zip_code' => $faker->regexify('[0-9]{4}[A-Z]{2}'),
        'telephone_number' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'city' => $faker->randomElement($array = array ('almere','lelystad','amsterdam')),
    ];
});


/*
 *  Model User  REQUIRES table: roles;
 */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $role = App\Models\Role::orderByRaw('RAND()')->first();

    return [
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'roles_id' => $role['id'],
        'remember_token' => str_random(10),
    ];
});


/*
 *  Model UserHasAchievements REQUIRES table: users, achievements;
 */
$factory->define(App\Models\UsersHasAchievement::class, function (Faker\Generator $faker) {

    $user = App\Models\User::orderByRaw('RAND()')->first();
    $achievement = App\Models\Achievement::orderByRaw('RAND()')->first();

    return [
        'users_id' => $user['id'],
        'achievements_id' => $achievement['id'],
    ];
});

/*
 *  Model UserHasAction REQUIRES table: users, actions;
 */
$factory->define(App\Models\UsersHasAction::class, function (Faker\Generator $faker) {

    $user = App\Models\User::orderByRaw('RAND()')->first();
    $action = App\Models\Action::orderByRaw('RAND()')->first();

    return [
        'users_id' => $user['id'],
        'action_id' => $action['id'],
    ];
});

/*
 *  Model UserInformation ;
 */
$factory->define(App\Models\UsersInformation::class, function (Faker\Generator $faker) {

    $user = App\Models\User::orderByRaw('RAND()')->first();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'address' => $faker->streetAddress,
        'address_number' => $faker->buildingNumber,
        'city' => $faker->randomElement($array = array ('almere','lelystad','amsterdam')),
        'zip_code' => $faker->regexify('[0-9]{4}[A-Z]{2}'),
        'alternative_email' => $faker->safeEmail,
        'mobile_number' => $faker->tollFreePhoneNumber,
        'additional_number' => $faker->tollFreePhoneNumber,
        'users_id' => $user['id'],
        'privacy_levels_id' => $privacyLevel['id'],
    ];
});