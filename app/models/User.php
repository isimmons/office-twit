<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Mass assignment protection.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'settings'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Force hashing of passwords.
	 *
	 * @param string $password
	 * @return void
	 */
	public function setPasswordAttribute($value)
	{
		//don't rehash already hashed password when user updates profile
		if(Hash::needsRehash($value))
			$this->attributes['password'] = Hash::make($value);
	}

	public function twits()
	{
		return $this->hasMany('Twit');
	}

}