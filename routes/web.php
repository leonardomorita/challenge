<?php
Auth::routes();

Route::get('/posts/novo', 'PostsController@novo');
Route::post('/posts/criar', 'PostsController@criar')->name('posts.criar');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/postagem/{id}', 'PublicController@postagem')->name('public.postagem');
Route::get('/', 'PublicController@index');
