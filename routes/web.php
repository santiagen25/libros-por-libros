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
Route::any('/inicio','UsuarioController@inicio')->name('inicio');
Route::any('/configuracion','UsuarioController@configuracion');
Route::any('/biblioteca','UsuarioController@biblioteca');
Route::any('/resultados','UsuarioController@resultados');
Route::any('/libro/{id}','UsuarioController@entrada');
Route::any('/registro','UnidentifiedController@registro')->name('registro');
Route::any('/usuario/{id}','UsuarioController@usuario')->name('registro');

//rutas ajax
Route::any('editarNombre.php', 'AjaxController@ajaxEditarNombre')->name('editarNombre');
Route::any('editarEmail.php', 'AjaxController@ajaxEditarEmail')->name('editarEmail');
Route::any('editarNacimiento.php', 'AjaxController@ajaxEditarNacimiento')->name('editarNacimiento');
Route::any('getPassword.php', 'AjaxController@ajaxGetPassword')->name('getPassword');
Route::any('editarPassword.php', 'AjaxController@ajaxEditarPassword')->name('editarPassword');
