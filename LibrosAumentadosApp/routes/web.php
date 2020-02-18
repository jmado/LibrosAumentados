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


Route::get("/", "LibrosController@index")->name("home");

Route::get('/admin', function () {
    return view('auth/login');
});

#Rutas Libros
Route::get("/libro/destroy/{id}", "LibrosController@destroy")->name("libro.delete");
Route::get("/libro/loginVisitante/{id}", "LibrosController@loginVisitante")->name("libro.loginVisitante");
Route::get("/libro/comprobarPalabra", "LibrosController@comprobarPalabra")->name("libro.comprobarPalabra");
Route::resource('/libro', 'LibrosController');
//Route::get("/libro/loginVisitante/{id}", "LibrosController@loginVisitante")->name("libro.login");

#Rutas Capitulos
Route::get("/capitulo/index/{id}", "CapitulosController@index")->name("capitulo.all");
Route::get("/capitulo/destroy/{id}", "CapitulosController@destroy")->name("capitulo.delete");
Route::get("/capitulo/contenido/{id}", "CapitulosController@contenido")->name("capitulo.contenido");
//Route::get("/capitulo/mostrar/{id_book}", "CapitulosController@mostrarCapitulosLibro")->name("capitulo.mostrarCapitulosLibro");
//Route::get("/capitulo/contenido/{id}", "CapitulosController@contenido")->name("capitulo.contenido");
Route::resource('/capitulo', 'CapitulosController');

#Rutas Páginas
Route::get("/pagina/index/{id}", "PaginasController@index")->name("pagina.all");
Route::get("/pagina/destroy/{id}", "PaginasController@destroy")->name("pagina.delete");
//Route::get("/pagina/mostrar/{id_capitulo}", "PaginasController@mostrarPaginaCapitulo")->name("pagina.mostrarPaginaCapitulo");
Route::resource('/pagina', 'PaginasController');

//Rutas Imagenes
Route::get("/imagen/index/{id}", "ImagensController@index")->name("imagen.all");
Route::get("/imagen/destroy/{id}", "ImagensController@destroy")->name("imagen.delete");
Route::resource('/imagen', 'ImagensController');

//Rutas Galerias
Route::get("/galeria/index/{id}", "GaleriasController@index")->name("galeria.all");
Route::get("/galeria/destroy/{id}", "GaleriasController@destroy")->name("galeria.delete");
Route::resource('/galeria', 'GaleriasController');




//Rutas Login Administrador
Auth::routes();
Route::get("/logout", "Auth\LoginController@logout")->name("logout");

Route::get('/home', 'LibrosController@welcome')->name('home');

//Route::group(['middleware' => 'web'], function () {
//    Route::auth();    
//    Route::get('/home', 'LibrosController@index')->name('home'); 
//});


