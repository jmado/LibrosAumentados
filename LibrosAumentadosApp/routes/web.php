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

Route::get('/', function () {
    return view('welcome');
});

#Rutas Libros
Route::get("/libro/destroy/{id}", "LibrosController@destroy")->name("libro.delete");
Route::resource('/libro', 'LibrosController');

//Rutas Capitulos
Route::get("/capitulo/destroy/{id}", "CapitulosController@destroy")->name("capitulo.delete");
Route::resource('/capitulo', 'CapitulosController');

//Rutas Imagenes
Route::get("/imagen/destroy/{id}", "ImagensController@destroy")->name("imagen.delete");
Route::resource('/imagen', 'ImagensController');

//Rutas Galerias
Route::get("/galeria/destroy/{id}", "GaleriasController@destroy")->name("galeria.delete");
Route::resource('/galeria', 'GaleriasController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
