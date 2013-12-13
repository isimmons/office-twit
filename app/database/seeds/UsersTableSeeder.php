<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		DB::table('users')->truncate();

		$users = [
                        [
                            'username' => 'john',
                            'password' => '1234',
                            'email' => 'john@twitmail.com',
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ],
                        [
                            'username' => 'sally',
                            'password' => '1234',
                            'email' => 'sally@twitmail.com',
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ]
                    ];
		
		DB::table('users')->insert($users);
	}

}
