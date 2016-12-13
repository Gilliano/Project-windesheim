<?php

use Illuminate\Database\Seeder;

class EducationsCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'ICT' =>  'ICT',
            'BedrijfsKunde' => 'Bedrijfskunde',
            'BouwKunde' => 'Bouwkunde',
            'Communicatie' => 'Communicatie',
            'Engineering' => 'Engineering',
            'Rechten' => 'Rechten'
            ];
        foreach ($names as $name=>$desc)
        {
            $row = new App\Models\EducationCollection([
                'name' => $name,
                'description' => $desc,
            ]);
            $row->save();
//            $row->roles()->sync(App\Models\Role::all()->random(5));
        }
    }
}
