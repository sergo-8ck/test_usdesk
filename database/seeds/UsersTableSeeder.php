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
                'password' => bcrypt('password')
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@test.loc',
                'password' => bcrypt('password')
            ]
        ];
        foreach ($users as $key=>$value){
            User::create($value);
        }
    }
}