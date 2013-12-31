<?php

class TwitsTableSeeder extends Seeder {

	public function run()
	{
                    DB::table('twits')->truncate();
		
		$twits = [
                        ['twit' => 'Johns first twit', 'user_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
                        ['twit' => 'Sallys first twit', 'user_id' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime]
                    ];
		
		DB::table('twits')->insert($twits);
	}

}
