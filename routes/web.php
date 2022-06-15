<?php

use Illuminate\Support\Facades\Route;

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

//Ruta inicio
Route::get('/', 'SalaController@index')->name('inicio');

//Ruta store para guardar
Route::post('/agregar' , 'SalaController@store')->name('store');

Route::get('/editar/{id}', 'SalaController@edit')->name('editar');

Route::put('/update/{id}', 'SalaController@update')->name('update');

Route::delete('/eliminar/{id}', 'SalaController@destroy')->name('eliminar');
