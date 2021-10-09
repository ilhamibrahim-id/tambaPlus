<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
        ];

        DB::table('users')->insert($user);

        $user1 =[
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nama' => 'admin',
                'jabatan' => 'admin'
            ],
        ];

        DB::table('admin')->insert($user1);
    }
}
