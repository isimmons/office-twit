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

		DB::table('twits')->truncate();
		DB::table('users')->truncate();
		
		$this->call('UsersTableSeeder');
		$this->call('TwitsTableSeeder');
		
	}

}