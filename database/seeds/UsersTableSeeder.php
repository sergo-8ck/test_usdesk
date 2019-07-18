<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'name' => 'admin',
                'email' => 'admin@test.loc',
                'password' => bcrypt('password'),
                'is_admin' => 1
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@test.loc',
                'password' => bcrypt('password'),
                'is_admin' => 1
            ]
        ];
        foreach ($users as $key=>$value){
            User::create($value);
        }
    }
}