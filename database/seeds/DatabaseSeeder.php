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
        DB::table('categories')->insert([
            'name' => 'Casual',
        ]);
        DB::table('brands')->insert([
            'name' => 'Nike'
        ]);
        DB::table('sizes')->insert([
            'name' => '9'
        ]);
        DB::table('items')->insert([
            'category_id' => 1,
            'brand_id' => 1,
            'size_id' => 1,
            'name' => 'HyperDunk 2013',
            'color_way' => 'red, black',
            'gender_pref' => 'm',
            'price' => 7000.00,
            'pic' => 'hyperdunk2013.jpg',
            'description' => 'Introducing, the HyperDunk 2013 with the latest version of Nike Zoom with Flywires 3.0.'
        ]);
    }
}
