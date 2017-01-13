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
            ['name' => 'block users', 'description' => 'can block other users', 'table_name' => 'users', 'action' => 'else'],
            ['name' => 'view users', 'description' => 'can view users', 'table_name' => 'users', 'action'=> 'view'],
            ['name' => 'create users', 'description' => 'can create users', 'table_name' => 'users', 'action'=> 'create'],
            ['name' => 'update users', 'description' => 'can update users', 'table_name' => 'users', 'action'=> 'update'],
            ['name' => 'delete users', 'description' => 'can delete users', 'table_name' => 'users', 'action'=> 'delete'],

            ['name' => 'view certificates', 'description' => 'can view certificates', 'table_name' => 'certificates', 'action'=> 'view'],
            ['name' => 'create certificates', 'description' => 'can create certificates', 'table_name' => 'certificates', 'action'=> 'create'],
            ['name' => 'update certificates', 'description' => 'can update certificates', 'table_name' => 'certificates', 'action'=> 'update'],
            ['name' => 'delete certificates', 'description' => 'can delete certificates', 'table_name' => 'certificates', 'action'=> 'delete'],

            ['name' => 'view users information', 'description' => 'can view users information', 'table_name' => 'users_information', 'action'=> 'view'],
            ['name' => 'create users information', 'description' => 'can create users information', 'table_name' => 'users_information', 'action'=> 'create'],
            ['name' => 'update users information', 'description' => 'can update users information', 'table_name' => 'users_information', 'action'=> 'update'],
            ['name' => 'delete users information', 'description' => 'can delete users information', 'table_name' => 'users_information', 'action'=> 'delete'],

            ['name' => 'view companies', 'description' => 'can view companies', 'table_name' => 'companies', 'action'=> 'view'],
            ['name' => 'create companies', 'description' => 'can create companies', 'table_name' => 'companies', 'action'=> 'create'],
            ['name' => 'update companies', 'description' => 'can update companies', 'table_name' => 'companies', 'action'=> 'update'],
            ['name' => 'delete companies', 'description' => 'can delete companies', 'table_name' => 'companies', 'action'=> 'delete'],

            ['name' => 'view jobs', 'description' => 'can view jobs', 'table_name' => 'jobs', 'action'=> 'view'],
            ['name' => 'create jobs', 'description' => 'can create jobs', 'table_name' => 'jobs', 'action'=> 'create'],
            ['name' => 'update jobs', 'description' => 'can update jobs', 'table_name' => 'jobs', 'action'=> 'update'],
            ['name' => 'delete jobs', 'description' => 'can delete jobs', 'table_name' => 'jobs', 'action'=> 'delete'],

            ['name' => 'view persons', 'description' => 'can view persons', 'table_name' => 'persons', 'action'=> 'view'],
            ['name' => 'create persons', 'description' => 'can create persons', 'table_name' => 'persons', 'action'=> 'create'],
            ['name' => 'update persons', 'description' => 'can update persons', 'table_name' => 'persons', 'action'=> 'update'],
            ['name' => 'delete persons', 'description' => 'can delete persons', 'table_name' => 'persons', 'action'=> 'delete'],

            ['name' => 'view skills', 'description' => 'can view skills', 'table_name' => 'skills', 'action'=> 'view'],
            ['name' => 'create skills', 'description' => 'can create skills', 'table_name' => 'skills', 'action'=> 'create'],
            ['name' => 'update skills', 'description' => 'can update skills', 'table_name' => 'skills', 'action'=> 'update'],
            ['name' => 'delete skills', 'description' => 'can delete skills', 'table_name' => 'skills', 'action'=> 'delete'],

            ['name' => 'view approve skills', 'description' => 'can view approve skills', 'table_name' => 'persons_approves_skills', 'action'=> 'view'],
            ['name' => 'create approve skills', 'description' => 'can create approve skills', 'table_name' => 'persons_approves_skills', 'action'=> 'create'],
            ['name' => 'update approve skills', 'description' => 'can update approve skills', 'table_name' => 'persons_approves_skills', 'action'=> 'update'],
            ['name' => 'delete approve skills', 'description' => 'can delete approve skills', 'table_name' => 'persons_approves_skills', 'action'=> 'delete'],

            ['name' => 'view schools', 'description' => 'can view schools', 'table_name' => 'schools', 'action'=> 'view'],
            ['name' => 'create schools', 'description' => 'can create schools', 'table_name' => 'schools', 'action'=> 'create'],
            ['name' => 'update schools', 'description' => 'can update schools', 'table_name' => 'schools', 'action'=> 'update'],
            ['name' => 'delete schools', 'description' => 'can delete schools', 'table_name' => 'schools', 'action'=> 'delete'],

            ['name' => 'view diplomas', 'description' => 'can view diplomas', 'table_name' => 'diplomas', 'action'=> 'view'],
            ['name' => 'create diplomas', 'description' => 'can create diplomas', 'table_name' => 'diplomas', 'action'=> 'create'],
            ['name' => 'update diplomas', 'description' => 'can update diplomas', 'table_name' => 'diplomas', 'action'=> 'update'],
            ['name' => 'delete diplomas', 'description' => 'can delete diplomas', 'table_name' => 'diplomas', 'action'=> 'delete'],


        ];
        foreach ($actions as $action)
        {
            App\Models\Action::create([
                'name' => $action['name'],
                'description' => $action['description'],
                'table_name' => $action['table_name'],
                'action' => $action['action']
            ])->save();
        }
    }
}
