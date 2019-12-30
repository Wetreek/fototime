<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>'language'], function()
{
    Route::get('/lang/{lang}', 'Sitecontroller@lang');
    Route::get('/', 'IndexController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/gallery', 'IndexController@gallery')->name('gallery');
    Route::get('/mygallery', 'IndexController@gallery')->name('mygallery');
    Route::get('/competition/{id}', 'IndexController@show');
    Route::get('/users', 'IndexController@users')->name('users');
    Route::get('/competitionOSutazi/{id}', 'IndexController@showOSutazi');
    Route::get('/archiveCompetitions', 'IndexController@archiveCompetitions')->name('archiveCompetitions');
    
 //Route::get('/competitionProposition/{id}', 'IndexController@showProposition');
    
    // Auth routes //
    // Login // 
    Route::get('/login', 'Auth\LoginController@index')->name('login');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
    Route::get('/redirect/{service}', 'Auth\LoginController@redirect');
    Route::get ('/callback/{service}', 'Auth\LoginController@callback');
    // Register //
    Route::get('/register', 'Auth\RegisterController@index')->name('register');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    // Edit
    Route::get('/edit/{id}', 'UsersController@edit')->name('edit');
    Route::get('/edit', 'UsersController@edit')->name('edit');
    Route::post('/edit', 'UsersController@edit')->name('edit');
    Route::get('/profile', 'UsersController@profile')->name('profile');
    Route::patch('/profile', 'UsersController@update');
    Route::patch('/edit', 'UsersController@update');

    // Route::get('/editAdmin', 'UsersController@editAdmin')->name('editAdmin');
    // Route::patch('/editAdmin/{id}', 'UsersController@update');

    // Route::get('/editUser/{id}', 'UsersController@editUser')->name('editUser');
    // Route::patch('/editUser/{id}', 'UsersController@updateUser');
});
