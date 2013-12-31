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
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('users')->truncate();
		DB::table('twits')->truncate();
		
		
		$this->call('UsersTableSeeder');
		$this->call('TwitsTableSeeder');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
	}

}