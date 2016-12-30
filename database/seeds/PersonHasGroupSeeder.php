<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class PersonHasGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education = App\Models\Education::where('name', 'AD Software Development')->pluck('id');

        Group::create(array(
            'name' => 'ADSD',
            'coordinator' => 99 ,
            'cohort_start' => '2016-09-01',
            'cohort_end' => '2018-06-01',
            'started_amount' => 20,
            'education_id' => $education[0],
        ));
    }
}