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

Route::resource('/','LoginController');
Route::post('/login','LoginController@login')->name('login');
Route::get('/inicio','UsuarioController@inicio');
Route::get('/configuracion','UsuarioController@configuracion');
Route::get('/biblioteca','UsuarioController@biblioteca');
Route::get('/resultados/{numeroDeLibros}','UsuarioController@resultados');
Route::get('/entrada/{isbn}','UsuarioController@entrada');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');