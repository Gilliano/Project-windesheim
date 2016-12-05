<?php

use Illuminate\Database\Seeder;

class PrivacyLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Public' => "Everybody can see it",
            'Only Alumni' => "Only Alumni can see it",
            'Only Classmates' => "Only Classmates can see it"];
        foreach ($names as $name=>$desc)
        {
            $row = new App\Models\PrivacyLevel([
                'name' => $name,
                'description' => $desc,
            ]);
            $row->save();

            $row->roles()->sync(App\Models\Role::all()->random(5));
        }
    }
}
