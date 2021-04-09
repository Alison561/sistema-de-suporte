<?php
use Src\Route as Route;

Route::get('/login', 'userController@getLogin');
Route::post('/login', 'userController@postLogin');

Route::get('/cadastro', 'userController@getCadastro');
Route::post('/cadastro', 'userController@postCadastro');


Route::get('/', 'indexController@index');
Route::post('/', 'indexController@postSuport');

Route::get('/admin', 'adminController@index');

Route::get('/admin/{id}', 'adminController@getChat');
Route::get('/admin/get/{id}', 'adminController@getReceberMsg');
Route::post('/admin/{id}', 'adminController@postChat');


Route::get('/{id}', 'indexController@getChat');
Route::get('/get/{id}', 'indexController@getReceberMsg');
Route::post('/{id}', 'indexController@postChat');
