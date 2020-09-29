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
Route::get('artisan', function () {
    Artisan::call('clear-compiled');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
});

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
// Route::get('home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

// Route::get('presupuestos-index', 'PresupuestoController@index')->name('presupuestos.index');
// Route::get('presupuestos-create', 'PresupuestoController@create')->name('presupuestos.create');


Route::group(['as' => 'finanzas.', 'prefix' => 'finanzas'], function(){
	
    Route::group(['as' => 'lista-presupuestos.', 'prefix' => 'lista-presupuestos'], function(){
        // Lista de Presupuestos
        Route::get('index', 'PresupuestoController@index')->name('index');

    });

    Route::group(['as' => 'presupuesto.', 'prefix' => 'presupuesto'], function(){
        // Presupuesto
        Route::get('create', 'PresupuestoController@create')->name('index');
        Route::get('mostrarPartidas/{id}', 'PresupuestoController@mostrarPartidas')->name('mostrar-partidas');
        
        Route::post('guardar-titulo', 'TituloController@store')->name('guardar-titulo');
        Route::post('actualizar-titulo', 'TituloController@update')->name('actualizar-titulo');
        Route::get('anular-titulo/{id}','TituloController@destroy')->name('anular-titulo');

        Route::post('guardar-partida', 'PartidaController@store')->name('guardar-partida');
        Route::post('actualizar-partida', 'PartidaController@update')->name('actualizar-partida');
        Route::get('anular-partida/{id}','PartidaController@destroy')->name('anular-partida');

    });
});
