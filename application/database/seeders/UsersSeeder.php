<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin'),
        	'role' => 'admin',
        	'block_id' => 0,
        	'department_id' => 0,
        	'phone' => '04245093801'
        ]);
    }
}