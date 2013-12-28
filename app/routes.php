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

Route::get('/', function()
{
    View::share('title', 'Homepage (i18n)');

	return View::make('home');
});

// Authentication
Route::get('login', array('uses' => 'AuthController@login', 'as' => 'login'));
Route::post('login', array('uses' => 'AuthController@doLogin', 'as' => 'login.do'));
Route::get('logout', array('uses' => 'AuthController@logout', 'as' => 'logout'));


// Pages
Route::group(array('before' => 'auth'), function() {
    Route::resource(
        'pages',
        'PagesController',
        array(
            'except' => array('index', 'show')
        )
    );

    Route::get('pages/{pages}/delete', array('uses' => 'PagesController@delete', 'as' => 'pages.delete'));
});

Route::resource(
    'pages',
    'PagesController',
    array(
        'only' => array('index', 'show')
    )
);
