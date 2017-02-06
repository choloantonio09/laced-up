<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => 'Cholo Miguel Antonio',
        	'email' => 'choloantonio.09@gmail.com',
        	'is_admin' => 1,
        	'password' => bcrypt('cholocholo')
        	]);
    }
}
