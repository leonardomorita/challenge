<?php
Auth::routes();

Route::get('/posts/novo', 'PostsController@novo');
Route::post('/posts/criar', 'PostsController@criar')->name('posts.criar');
Route::get('/posts/editar/{id}', 'PostsController@editar')->name('posts.editar');
Route::put('/posts/atualizar/{id}', 'PostsController@atualizar')->name('posts.atualizar');
Route::delete('/posts/deletar/{id}', 'PostsController@deletar')->name('posts.deletar');
Route::post('/posts/publicar', 'PostsController@publicar')->name('posts.publicar');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/postagem/{id}', 'PublicController@postagem')->name('public.postagem');
Route::get('/', 'PublicController@index');
