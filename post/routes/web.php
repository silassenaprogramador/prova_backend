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

Route::get('/', 'HomeController@index');
Route::get('/listpostcat/{categoria}','HomeController@listarPostCategoria');

Route::get('/backend', 'PostController@index');


Route::get('/listpost','PostController@index');
Route::get('/createpost','PostController@create');
Route::post('/createpost','PostController@store');
Route::get('/editpost/{id}','PostController@edit');
Route::post('/editpost/{id}','PostController@update');
Route::get('/deletepost/{id}','PostController@destroy');
Route::get('/filtrarcategoria/{categoria}','PostController@filtrarPostagensCategoria');

