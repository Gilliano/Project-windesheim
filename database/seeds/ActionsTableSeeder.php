<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
            ['name' => 'block users', 'description' => 'can block other users', 'action'=> 'else'],
            ['name' => 'view users', 'description' => 'can view users', 'action'=> 'view'],
            ['name' => 'create users', 'description' => 'can create users', 'action'=> 'create'],
            ['name' => 'update users', 'description' => 'can update users', 'action'=> 'update'],
            ['name' => 'delete users', 'description' => 'can delete users', 'action'=> 'delete']


        ];
        foreach ($actions as $action)
        {
            App\Models\Action::create([
                'name' => $action['name'],
                'description' => $action['description'],
                'action' => $action['action']
            ])->save();
        }
    }
}
