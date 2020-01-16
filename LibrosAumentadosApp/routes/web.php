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

Route::get('/admin', function () {
    return view('auth/login');
});

#Rutas Libros
Route::get("/libro/destroy/{id}", "LibrosController@destroy")->name("libro.delete");
Route::resource('/libro', 'LibrosController');

#Rutas Capitulos
Route::get("/capitulo/destroy/{id}", "CapitulosController@destroy")->name("capitulo.delete");
Route::get("/capitulo/mostrar/{id_book}", "CapitulosController@mostrarCapitulosLibro")->name("capitulo.mostrarCapitulosLibro");
Route::resource('/capitulo', 'CapitulosController');

#Rutas Páginas
Route::get("/pagina/destroy/{id}", "PaginasController@destroy")->name("pagina.delete");
Route::get("/pagina/mostrar/{id_capitulo}", "PaginasController@mostrarPaginaCapitulo")->name("pagina.mostrarPaginaCapitulo");
Route::resource('/pagina', 'PaginasController');

//Rutas Imagenes
Route::get("/imagen/destroy/{id}", "ImagensController@destroy")->name("imagen.delete");
Route::resource('/imagen', 'ImagensController');

//Rutas Galerias
Route::get("/galeria/destroy/{id}", "GaleriasController@destroy")->name("galeria.delete");
Route::resource('/galeria', 'GaleriasController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
