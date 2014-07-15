<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that can be passed in when creating a user.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'email', 'password', 'role', 'is_suspended', 'is_hidden');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	protected $roles = array('admin', 'editor');



	public function catalogueaudit()
    {
        return $this->hasMany('CatalogueAudit');
    }

    public function backups()
    {
        return $this->hasMany('Backups');
    }



    public function saveUser()
    {
    	$data 		= Input::all();
		$validator 	= Validator::make($data, $this->getValidationRules());

		if ($validator->passes()) {
			
			$this->fill($data);

			$this->password = Hash::make($this->password);
			
			$this->save();

			return $this;
		}

		return $validator;
    }

	/**
	 * Return a set of rules for validating properties
	 * 
	 * @return mixed $rules
	 */
	protected function getValidationRules()
	{
		return array(
			'name' 				=> 'required|max:255',
			'email' 			=> 'required|email|unique:users,email_address',
			'password'			=> 'sometimes|same:confirm_password',
			'is_suspended'		=> 'required|max:1',
			'role'				=> 'required|in:' . implode(',', $this->roles),
		);
	}



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

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}