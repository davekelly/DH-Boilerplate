<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//--------------------------------------
// Static Pages
//======================================
// homepage...
Route::get('/', function(){
	return View::make('static.home');
});

// group of pages under /about
Route::group(array('prefix' => 'about'), function(){

	Route::get('/', function(){
		return View::make('static.about');
	});

	Route::get('team', function(){
		return View::make('static.about');
	});
	
	Route::get('contact', function(){
		return View::make('static.contact');
	});
	
	Route::get('development', function(){
		return View::make('static.development');
	});
});

//--------------------------------------
//	App routes
//======================================
//
// .... go here...
//


// sample Europeana search integration......can be deleted
// Requires the installation of Guzzle through /composer.json
// 
// Route::get('/related', 'RelatedExampleController@getRelated');

// Catalogue
// ...delete if not needed...
Route::get('/catalogue/search', 'CatalogueController@search');
Route::get('/catalogue/import', 'CatalogueController@importCsv');
Route::resource('catalogue', 'CatalogueController');




//--------------------------------------
// Documentation
//======================================
Route::get(Config::get('docs.basehref', '/docs/').'{chapter?}', 'DocumentationController@showDocs');


//--------------------------------------
// Ver 1 API resources
//======================================
Route::group(array('prefix' => 'api/v1'), function() {
 
 	// => GET /api/v1/something
 	// => GET /api/v1/something/show/{id}
 	
 	Route::group(array('prefix' => 'catalogue'), function(){
 		// /api/v1/catalogue
 		Route::get('/', 'Apiv1\CatalogueApiController@index');
 					
 		Route::get('/{id}', 'Apiv1\CatalogueApiController@show')
 					->where(array(
 						'id' => '[0-9]+'
 						) 
 					);
 	});

    
});


// -------------------------------------
// User Routes
// =====================================
	// user profile
	Route::get('user', array('before' => 'auth', 'as' => 'user', 'uses' => 'UserController@index'));

	// user login form
	Route::get('user/login', function(){
		return View::make('user.login');
	});
	// handle user login
	Route::post('user/login', array('before' => 'csrf', 'uses' => 'UserController@processLogin'));

	// log user out
	Route::get('user/logout', function(){
		return Auth::logout();
	});

	
// -------------------------------------
// User Routes
// =====================================
// user profile
Route::get('user', array('before' => 'auth', 'as' => 'user', 'uses' => 'UserController@index'));

// user login form
Route::get('user/login', function(){
	return View::make('user.login');
});
// handle user login
Route::post('user/login', array('before' => 'csrf', 'uses' => 'UserController@processLogin'));

// log user out
Route::get('user/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

// Handle password reminders
// @see http://laravel.com/docs/security#password-reminders-and-reset
// Route::controller('password', 'RemindersController');



// CRUD routes for Users
Route::get('/user/create', array('before' => 'admin', 'uses' => 'UserController@create'));
Route::post('/user', array('before' => 'admin', 'before' => 'csrf', 'uses' => 'UserController@store'));
Route::get('/user/{id}/edit', array('before' => 'auth', 'uses' => 'UserController@edit'));
Route::put('/user/{id}', array('before' => 'auth', 'before' => 'csrf', 'uses' => 'UserController@update'));
// Route::delete('/user/{id}', array('before' => 'admin', 'before' => 'csrf', 'uses' => 'UserController@destroy'));


// 
// Settings
// 
// Route::get('settings/backup/{type?}', array('before' => 'auth', 'uses' => 'SettingsController@backup'));



//--------------------------------------
// 404 errors
//======================================
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});