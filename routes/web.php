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
Route::get('/regencies', 'CountryController@regencies');
Route::get('/districts', 'CountryController@districts');
Route::get('/village', 'CountryController@villages');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')
// ->middleware(['auth','admin'])
->group(function () {
    Route::get('dashboard','Admin\DashboardController@index')->name('admin.dashboard.index');


    // CRUD PEMOHON
    Route::get('pemohon', 'Admin\PemohonController@index')->name('admin.pemohon.index');
    Route::get('pemohon/create', 'Admin\PemohonController@create')->name('admin.pemohon.create');
    Route::post('pemohon/create', 'Admin\PemohonController@store')->name('admin.pemohon.store');
    Route::get('pemohon/edit/{id}', 'Admin\PemohonController@edit')->name('admin.pemohon.edit');
    Route::post('pemohon/update/{id}', 'Admin\PemohonController@update')->name('admin.pemohon.update');
    Route::get('pemohon/delete/{id}', 'Admin\PemohonController@delete')->name('admin.pemohon.delete');

    // CRUD LAYANAN
    Route::get('layanan', 'Admin\LayananController@index')->name('admin.layanan.index');
    Route::post('layanan/create', 'Admin\LayananController@store')->name('admin.layanan.store');
    Route::post('layanan/update/{id}', 'Admin\LayananController@update')->name('admin.layanan.update');
    Route::get('layanan/delete/{id}', 'Admin\LayananController@delete')->name('admin.layanan.delete');

    // CRUD KANTOR
    Route::get('kantor', 'Admin\KantorController@index')->name('admin.kantor.index');
    Route::post('kantor/create', 'Admin\KantorController@store')->name('admin.kantor.store');
    Route::post('kantor/update/{id}', 'Admin\KantorController@update')->name('admin.kantor.update');
    Route::get('kantor/delete/{id}', 'Admin\KantorController@delete')->name('admin.kantor.delete');

});