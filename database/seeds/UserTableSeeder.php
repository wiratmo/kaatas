<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

        DB::table('roles')->insert([
            'role' => 'contributor',
            ]);
        for ($i=0; $i <4 ; $i++) { 
        	User::create([
	        	'name' => $faker->name,
	        	'username' => $faker->username,
	        	'email' => 'contributor'.$i.'@gmail.com',
                'phoneNumber' => $faker->phoneNumber,
	        	'password' => bcrypt('contributor'),
	        	'photo' => $faker->name.'.png',
	        	'lastLogin' => $faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
	        	'lastIp' => $faker->ipv4,
                'aboutMe' => $faker->text
        	]);
        };
    }
}
