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

// sample Europeana search integration...
Route::get('/related', 'RelatedExampleController@getRelated');

// Catalogue
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
 		// /api/v1/catalogue/list
 		Route::get('list/{format?}', 'Apiv1\CatalogueApiController@listItems')->where('format', '[A-Za-z]+');;
 		Route::get('/{id}/{format?}', 'Apiv1\CatalogueApiController@show')->where(array('format' => '[A-Za-z]+', 'id' => '[0-9]+') );
 	});

    // Route::resource('something', 'ApiController', array('only' => array('index', 'show')));
});



//--------------------------------------
// 404 errors
//======================================
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});