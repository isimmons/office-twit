<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->truncate();
		DB::table('twits')->truncate();
		
		
		$this->call('UsersTableSeeder');
		$this->call('TwitsTableSeeder');
		
	}

}