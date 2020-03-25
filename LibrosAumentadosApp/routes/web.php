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
Route::get("/libro/loginVisitante/{id}", "LibrosController@loginVisitante")->name("libro.loginVisitante");
Route::get("/libro/comprobarPalabra", "LibrosController@comprobarPalabra")->name("libro.comprobarPalabra");
Route::resource('/libro', 'LibrosController');
Route::get("/libro/loginVisitante/{id}", "LibrosController@loginVisitante")->name("libro.login");

//Libros confirmacion de borrado 
Route::get("/libro/deleteConfirm/{id}", "LibrosController@deleteConfirm")->name("libro.deleteConfirm");



#Rutas Capitulos
Route::get("/capitulo/index/{id}", "CapitulosController@index")->name("capitulo.all");
Route::get("/capitulo/destroy/{id}", "CapitulosController@destroy")->name("capitulo.delete");
Route::get("/capitulo/contenido/{id}", "CapitulosController@contenido")->name("capitulo.contenido");
Route::resource('/capitulo', 'CapitulosController');

//Capitulos confirmacion de borrado 
Route::get("/capitulo/deleteConfirm/{id}", "CapitulosController@deleteConfirm")->name("capitulo.deleteConfirm");



#Rutas Páginas
Route::get("/pagina/index/{id}", "PaginasController@index")->name("pagina.all");
Route::get("/pagina/destroy/{id}", "PaginasController@destroy")->name("pagina.delete");
Route::resource('/pagina', 'PaginasController');



//Rutas Imagenes
Route::get("/imagen/index/{id}", "ImagensController@index")->name("imagen.all");
Route::get("/imagen/destroy/{id}", "ImagensController@destroy")->name("imagen.delete");
Route::resource('/imagen', 'ImagensController');
    //AJAX
    Route::post("/imagen/buscador", "ImagensController@buscador")->name("imagen.buscador");
//Imagenes confirmacion de borrado 
Route::get("/imagen/deleteConfirm/{id}", "ImagensController@deleteConfirm")->name("imagen.deleteConfirm");



//Rutas Galerias
Route::get("/galeria/index/{id}", "GaleriasController@index")->name("galeria.all");
Route::get("/galeria/destroy/{id}", "GaleriasController@destroy")->name("galeria.delete");
Route::resource('/galeria', 'GaleriasController');



//Rutas Modelos_3d
Route::get("/modelo/index/{id}", "Modelo_3dController@index")->name("modelo.all");
Route::get("/modelo/destroy/{id}", "Modelo_3dController@destroy")->name("modelo.delete");
Route::resource('/modelo', 'Modelo_3dController');



//Rutas Videos
Route::get("/video/index/{id}", "VideosController@index")->name("video.all");
Route::get("/video/destroy/{id}", "VideosController@destroy")->name("video.delete");
Route::resource('/video', 'VideosController');



//Rutas Audios
Route::get("/audio/index/{id}", "AudiosController@index")->name("audio.all");
Route::get("/audio/destroy/{id}", "AudiosController@destroy")->name("audio.delete");
Route::resource('/audio', 'AudiosController');



//Rutas Descargas (Otros Archivos)
Route::get("/descarga/index/{id}", "DescargasController@index")->name("descarga.all");
Route::get("/descarga/destroy/{id}", "DescargasController@destroy")->name("descarga.delete");
Route::resource('/descarga', 'DescargasController');


Auth::routes();
Route::get('/home', 'LibrosController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Rutas para usuarios
Route::get('admin/users', 'AdminUserController@index')->name('admin.user.index');
Route::get('admin/users/edit/{id}', 'AdminUserController@update')->name('admin.user.edit');
Route::get('admin/users/create', 'AdminUserController@create')->name('admin.user.create');
Route::get('admin/users/store', 'AdminUserController@store')->name('admin.user.store');
Route::get('admin/users/destroy/{id}', 'AdminUserController@destroy')->name('user.delete');
//Route::resource('admin/users', 'AdminUserController');