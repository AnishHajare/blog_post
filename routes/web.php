<?php

use Faker\Provider\Lorem;

Route::get('/', 'PostsController@index')->name('home');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');

Route::post("/posts/{post}/comments", 'CommentsController@store');

Route::get("/register",'RegistrationController@create');
Route::post("/register",'RegistrationController@store');

Route::get("/login",'SessionsController@create');
Route::post("/login",'SessionsController@store');
Route::get("/logout",'SessionsController@destroy');