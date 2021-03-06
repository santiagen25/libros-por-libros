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
Route::any('/newPassword','UnidentifiedController@newPassword')->name('newPassword');
Route::any('/inicio','UsuarioController@inicio')->name('inicio');
Route::any('/configuracion','UsuarioController@configuracion');
Route::any('/biblioteca','UsuarioController@biblioteca');
Route::any('/resultados','UsuarioController@resultados');
Route::any('/libro/{id}','UsuarioController@entrada');
Route::any('/registro','UnidentifiedController@registro')->name('registro');
Route::any('/usuario/{id}','UsuarioController@usuario')->name('usuario');
Route::any('/listado','UsuarioController@listado');
Route::any('/creacion-usuario','UsuarioController@creacionUsuario');
Route::any('/nuevo-libro','UsuarioController@nuevoLibro');
Route::any('/editar-libro/{id}','UsuarioController@editarLibro')->name('editarLibro');
Route::any('/faq','UnidentifiedController@faq');

//rutas ajax
Route::any('editarNombre.php', 'AjaxController@ajaxEditarNombre')->name('editarNombre');
Route::any('editarEmail.php', 'AjaxController@ajaxEditarEmail')->name('editarEmail');
Route::any('editarNacimiento.php', 'AjaxController@ajaxEditarNacimiento')->name('editarNacimiento');
Route::any('getPassword.php', 'AjaxController@ajaxGetPassword')->name('getPassword');
Route::any('editarPassword.php', 'AjaxController@ajaxEditarPassword')->name('editarPassword');
Route::any('editarTitulo.php', 'AjaxController@ajaxEditarTitulo')->name('editarTitulo');
Route::any('editarPuntuacion.php', 'AjaxController@ajaxEditarPuntuacion')->name('editarPuntuacion');
Route::any('editarComentario.php', 'AjaxController@ajaxEditarComentario')->name('editarComentario');
Route::any('comprobarEmail.php', 'AjaxController@ajaxComprobarEmail')->name('comprobarEmail');
Route::any('editarAdmin.php', 'AjaxController@ajaxEditarAdmin')->name('editarAdmin');
Route::any('editarBlock.php', 'AjaxController@ajaxEditarBlock')->name('editarBlock');
Route::any('editarMeGusta.php', 'AjaxController@ajaxEditarMeGusta')->name('editarMeGusta');
Route::any('resetPassword.php', 'AjaxController@ajaxResetPassword')->name('resetPassword');

// Email related routes
//Route::any('mail/send', 'MailController@send')->name('sendMail');
