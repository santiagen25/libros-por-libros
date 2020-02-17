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

Route::any('/','UnidentifiedController@login')->name('login');
Route::any('/login','UnidentifiedController@login')->name('login');
Route::any('/inicio','UsuarioController@inicio');
Route::any('/configuracion','UsuarioController@configuracion');
Route::any('/biblioteca','UsuarioController@biblioteca');
Route::any('/resultados/{numeroDeLibros}','UsuarioController@resultados');
Route::any('/libro/{isbn}','UsuarioController@entrada');
