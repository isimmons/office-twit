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
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ],
                        [
                            'username' => 'sally',
                            'password' => Hash::make('1234'),
                            'email' => 'sally@twitmail.com',
                            'settings' => $this->getDefaultSettings(),
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime
                        ]
                    ];
		
		DB::table('users')->insert($users);
	}

        protected function getDefaultSettings()
        {
            $settings = [
                'allowTwitter' => '0',
                'twitterHandle' => null,
                'publicEmail' => false
            ];

            return json_encode($settings);
            
        }

}
