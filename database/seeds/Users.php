<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
        	'name' => 'admin',
        	'email' => 'abed@admin.com',
        	'password' => bcrypt('123456'),
        	'group' => 'admin',
        ]);
    }
}
