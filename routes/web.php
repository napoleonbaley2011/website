<?php

use App\Http\Controllers\ArticuloComunidadesController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\BarriosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComunidadesController;
use App\Http\Controllers\GaleriaNoticiasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\PortadasController;
use App\Http\Controllers\PropuestasController;
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\UserController;
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

Route::get('/', [IndexController::class, 'index'])->name('public.index');
Route::get('/actividad/{tipo}', [NoticiasController::class, 'publico'])->name('public.noticias');
Route::get('/actividad/{id}/ver', [NoticiasController::class, 'ver'])->name('public.noticias.ver');
Route::post('/actividad/search', [NoticiasController::class, 'publicoSearch'])->name('public.noticias.search');
Route::get('/c41/barrios', [BarriosController::class, 'barrios'])->name('c41.barrios');
Route::get('/c41/comunidades', [ComunidadesController::class, 'comunidades'])->name('c41.comunidades');
Route::post('/search', [IndexController::class, 'search'])->name('public.search');
Route::get('/proyecto',[ProyectController::class, 'presentacion'])->name('public.proyecto');


// Route::get('/seguimiento', 'SeguimientoController@listaPublica')->name('seguimiento');
// Route::get('/propuestas', 'PropuestasController@listaPublica')->name('propuestas');

// Route::get('/c41/barrios/{id}', ['ArticulosController@publicaciones'])->name('c41.barrio');
// Route::get('/c41/barrios/publicacion/{id}', 'ArticulosController@showpublicacion')->name('c41.verb');

// Route::get('/c41/comunidades/{id}', 'ArticuloComunidadesController@publicaciones')->name('c41.comunidad');
// Route::get('/c41/comunidades/publicacion/{id}', 'ArticuloComunidadesController@showpublicacion')->name('c41.verc');

// Route::get('/participacion', 'ParticipacionesController@create')->name('participacion');
// Route::post('/participacion', 'ParticipacionesController@store')->name('participacion.store');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/perfil', [IndexController::class, 'perfil'])->name('public.perfil');

Route::resource('noticias', NoticiasController::class);
Route::resource('galeria_noticia', GaleriaNoticiasController::class);
Route::get('barrios', [BarriosController::class, 'index'])->name('barrios.index');
Route::get('comunidades', [ComunidadesController::class, 'index'])->name('comunidades.index');
Route::resource('categorias', CategoriasController::class); 
Route::resource('propuestas', PropuestasController::class);
Route::resource('portadas', PortadasController::class);
Route::resource('articulos', ArticulosController::class);
Route::resource('articuloscom', ArticuloComunidadesController::class);
Route::resource('user', UserController::class);
Route::post('user/password', [UserController::class, 'editPassword'])->name('user.password');

// Route::get('/participacion/lista', 'ParticipacionesController@index')->name('participacion.index');

// Route::get('/galeria/{id}/lista', 'GaleriasController@index')->name('galeria.index');
// Route::post('/galeria/store', 'GaleriasController@store')->name('galeria.store');
// Route::post('/galeria/destroy', 'GaleriasController@destroy')->name('galeria.destroy');

// Route::get('/galeria_comunidad/{id}/lista', 'GaleriaComunidadesController@index')->name('galeriacom.index');
// Route::post('/galeria_comunidad/store', 'GaleriaComunidadesController@store')->name('galeriacom.store');
// Route::post('/galeria_comunidad/destroy', 'GaleriaComunidadesController@destroy')->name('galeriacom.destroy');

Route::resource('proyectos', ProyectController::class);