<?php

class TwitsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('twits')->truncate();

		$twits = [
                        ['twit' => 'Johns first twit', 'user_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
                        ['twit' => 'Sallys first twit', 'user_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime]
                    ];

		// Uncomment the below to run the seeder
		DB::table('twits')->insert($twits);
	}

}
