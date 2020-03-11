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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')
      ->name('home')
      ->middleware('password.confirm');

Route::get('/lazy', function() {

    DB::listen(function ($query){
        echo ($query->sql);
    });

// Fetches all users from DB
//  $users = \App\User::all();  

// No users are fetched until a collection item is requested, in the next query 
  $users = \App\User::cursor();

  echo ($users->get(100));

});


