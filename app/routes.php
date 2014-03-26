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

Route::get('/', 'HomeController@index');

// Authentication
Route::get('login', array('uses' => 'AuthController@login', 'as' => 'login'));
Route::post('login', array('uses' => 'AuthController@doLogin', 'as' => 'login.do'));
Route::get('logout', array('uses' => 'AuthController@logout', 'as' => 'logout'));


// Pages
Route::group(array('before' => 'auth', 'prefix' => 'admin'), function() {

    Route::resource(
        'pages',
        'admin\PagesController',
        array(
            'except' => array('show'),
        )
    );

    Route::get('pages/{pages}/delete', array('uses' => 'admin\PagesController@delete', 'as' => 'admin.pages.delete'));

    Route::get('', array('uses' => 'admin\HomeController@index', 'as' => 'admin.index'));
});

Route::resource(
    'pages',
    'PagesController',
    array(
        'only' => array('index', 'show')
    )
);


// Tags
Route::group(array('before' => 'auth'), function() {
    Route::resource(
        'tags',
        'TagsController',
        array(
            'except' => array('index', 'show')
        )
    );

    Route::get('tags/{tags}/delete', array('uses' => 'TagsController@delete', 'as' => 'tags.delete'));
});

Route::resource(
    'tags',
    'TagsController',
    array(
        'only' => array('index', 'show')
    )
);
