<?php

class UserController extends BaseController {

	public function processLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
		    return Redirect::intended('user');
		}
	}	
	
	// 
	// The following routes are protected
	// 

	public function index()
	{
		// logged in user gets this page
		// ....do something with it.

		return View::make('hello');
	}

	public function create()
	{
		// create a new user
	}

	public function store()
	{
		// post action handling new
		// user creation
	}

	public function edit($id)
	{
		// get form to edit current user
	}

	public function update($id)
	{
		// save updated user details
	}

	public function destroy($id)
	{
		// delete a user
	}

	
}