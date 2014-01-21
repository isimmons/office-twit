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

		//disable foreign key check for this connection before running seeders
		//DB::statement('SET FOREIGN_KEY_CHECKS=0;');
				
		$this->call('UsersTableSeeder');
		$this->call('TwitsTableSeeder');

		// supposed to reset it's self for the next connection
		// but I like to explicitly undo what I've done for clarity
		//DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
	}

}