<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //Chaining Method ( -> )
    DB::table('users')->insert([
    [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'role' => 'admin',
        'password' => bcrypt('password'),
    ],
        
]);

    }
}
