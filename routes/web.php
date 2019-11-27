<?php

use Faker\Provider\Lorem;

Route::get('/', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');

Route::post("/posts/{post}/comments", 'CommentsController@store');
