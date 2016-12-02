<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Admin' => "People that do admin stuff",
            'Alumni' => "People that do alumni stuff",
            'Business' => "People that do business stuff",
            'Management' => "People that do management stuff",
            'Social Work' => "People that do social work stuff",
            'Health' => "People that do health stuff",
            'ICT' => "People that do ict stuff",
            'Technology' => "People that do technology stuff",
            'Law' => "People that do law stuff",
            'Education' => "People that do education stuff"]; // TODO: Fetch these out of a global config file
        foreach ($names as $name=>$desc)
        {
            App\Models\Role::create([
                'name' => $name,
                'description' => $desc,
            ])->save();
        }
    }
}
