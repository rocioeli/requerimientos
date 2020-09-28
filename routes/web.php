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

Route::get('/index', 'PresupuestoController@index')->name('presupuestos.index');
Route::get('/create', 'PresupuestoController@create')->name('presupuestos.create');