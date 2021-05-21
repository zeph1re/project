<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class Account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'level' => 'admin',
                'password' => bcrypt ('admin123'),
            ],
            [
                'username' => 'user',
                'name' => 'user',
                'email' => 'user@gmail.com',
                'level' => 'user',
                'password' => bcrypt ('user123'),
            ]
        ];
            foreach ($user as $key => $value){
                User::create($value);
            }
    }
}
