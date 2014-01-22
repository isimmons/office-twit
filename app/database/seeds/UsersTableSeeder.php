<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->truncate();
                         
		$users = [
                        [
                            'username' => 'john',
                            'password' => Hash::make('1234'),
                            'email' => 'john@twitmail.com',
                            'settings' => $this->getDefaultSettings(),
                            'bio' => 'My name is John',
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ],
                        [
                            'username' => 'sally',
                            'password' => Hash::make('1234'),
                            'email' => 'sally@twitmail.com',
                            'settings' => $this->getDefaultSettings(),
                            'bio' => 'My name is Sally',
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ]
                    ];
		
		DB::table('users')->insert($users);
	}

        protected function getDefaultSettings()
        {
            $settings = [
                'allowTwitter' => 1,
                'twitterHandle' => null,
                'publicEmail' => 0
            ];

            return json_encode($settings);
            
        }

}
