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
        'user_id' => $user['id'],
        'privacy_level_id' => $privacyLevel['id'],
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
        'user_id' => $faker->unique()->numberBetween($min = ($user -99), $max = $user),
        'privacy_level_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model Diplomas  REQUIRES table: persons, schools;
 */
$factory->define(App\Models\Diploma::class, function (Faker\Generator $faker) {

    $person = App\Models\Person::orderByRaw('RAND()')->first();
    $school = App\Models\School::orderByRaw('RAND()')->first();

    return [
        'graduated_year' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'education' => $faker->text($maxNbChars = 45),
        'education_classcode' => $faker->word,
        'person_id' => $person['id'],
        'school_id' => $school['id'],
        'school_name' => $faker->name,
    ];
});

/*
 *  Model Educations  REQUIRES table: schools;
 */
$factory->define(App\Models\Education::class, function (Faker\Generator $faker, $education_names) {

    $school = App\Models\School::orderByRaw('RAND()')->first();
    $education_names = ["HBO-ICT", "AD Software Devleopment", "Bedrijfseconomie",
        "Bedrijfskunde MER", "Bouwkunde", "Commerciële Economie", "Communicatie",
        "Engineering", "HBO-Rechten"];

    return [
        'name' => $faker->unique()->randomElement($array = $education_names),
        'description' => $faker->text($maxNbChars = 45),
        'length' => $faker->randomElement($array = array (2, 4)),
        'school_id' => $school['id'],
    ];
});

/*
 *  Model Groups  REQUIRES table: persons, educations;
 */
$factory->define(App\Models\Group::class, function (Faker\Generator $faker) {

    $person = App\Models\Person::orderByRaw('RAND()')->first();
    $education = App\Models\Education::orderByRaw('RAND()')->first();

    return [
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 45),
        'coordinator' => $person['id'],
        'cohort_start' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYears(2))),
        'cohort_end' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'started_amount' => $faker->numberBetween(15, 30),
        'education_id' => $education['id'],
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
        'zip_code' => $faker->regexify('[1-9][0-9]{3}[a-z]{2}'), // Does not consider 'illegal' chars for NL codes (ss, sa and sd)
        'city' => $faker->randomElement($array = array ('almere','lelystad','amsterdam')), // TODO: Does not match zip_code...
        'function' => $faker->jobTitle,
        'salary_min' => $faker->numberBetween($min = 1000, $max = 10000),
        'salary_max' => $faker->numberBetween($min = 10001, $max = 50000),
        'started_at' => $faker->randomElement($array = array (Carbon::now(), Carbon::now()->subYear())),
        'current_job' => $faker->numberBetween($min = 0, $max = 1),
        'person_id' => $person['id'],
        'privacy_level_id' => $privacyLevel['id'],
    ];
});

/*
 *  Model Person  REQUIRES table: users, privacy_levels, groups;
 */
$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {

    $user = App\Models\User::count();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();
    $group = App\Models\Group::orderByRaw('RAND()')->first();

    return [
        'firstname' => $faker->firstName($gender = null|'male'|'female'),
        'lastname' => $faker->lastName,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sex' => $faker->numberBetween($min = 0, $max = 1),
        'autobiography' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->unique()->numberBetween($min = 1, $max = ($user -100)),
        'privacy_level_id' => $privacyLevel['id'],
        'group_id' => $group['id'],
    ];
});

/*
 *  Model Questions  REQUIRES table: surveys;
 */
$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {

    $survey = App\Models\Survey::orderByRaw('RAND()')->first();

    return [
        'question' => $faker->text($maxNbChars = 80),
        'survey_id' => $survey['id'],
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
 *  Model Survey ;
 */
$factory->define(App\Models\Survey::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->text($maxNbChars = 45),
        'description' => $faker->text($maxNbChars = 200),
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
        'role_id' => $role['id'],
        'remember_token' => str_random(10),
    ];
});


/*
 *  Model UserInformation ;
 */
$factory->define(App\Models\UserInformation::class, function (Faker\Generator $faker) {

    $user = App\Models\User::count();
    $privacyLevel = App\Models\PrivacyLevel::orderByRaw('RAND()')->first();

    return [
        'address' => $faker->streetAddress,
        'address_number' => $faker->buildingNumber,
        'city' => $faker->randomElement($array = array ('almere','lelystad','amsterdam')),
        'zip_code' => $faker->regexify('[0-9]{4}[A-Z]{2}'),
        'alternative_email' => $faker->safeEmail,
        'mobile_number' => $faker->tollFreePhoneNumber,
        'additional_number' => $faker->tollFreePhoneNumber,
        'user_id' => $faker->unique($reset = true)->numberBetween($min = 1, $max = $user),
        'privacy_level_id' => $privacyLevel['id'],
    ];
});