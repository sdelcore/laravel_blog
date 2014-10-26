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

Route::get('/', array('uses' => 'HomeController@showWelcome'));

Route::post('/', array('uses' => 'HomeController@doWelcome'));

Route::get('login', array('uses' => 'HomeController@showLogin'));

Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));

Route::get('register', array('uses' => 'HomeController@showRegister'));

Route::post('register', array('uses' => 'HomeController@doRegister'));

Route::post('post', array('uses' => 'HomeController@doPost'));

Route::get('post', array('uses' => 'HomeController@showPost'));

Route::get('comment/{post_id}', array('uses' => 'HomeController@showComment'));

Route::post('comment/{post_id}', array('uses' => 'HomeController@doComment'));