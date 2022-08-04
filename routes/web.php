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

Route::get('/clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
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


        // CRUD PETUGAS
        Route::get('petugas', 'Admin\PetugasController@index')->name('admin.petugas.index');
        Route::post('petugas/create', 'Admin\PetugasController@store')->name('admin.petugas.store');
        Route::post('petugas/update/{id}', 'Admin\PetugasController@update')->name('admin.petugas.update');
        Route::get('petugas/delete/{id}', 'Admin\PetugasController@delete')->name('admin.petugas.delete');
    });

Route::prefix('petugas')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('dashboard', 'Petugas\DashboardController@index')->name('petugas.dashboard.index');
        Route::get('terima/{antrian_id}', 'Petugas\DashboardController@terima')->name('petugas.terima.antrian');
        Route::get('tolak/{antrian_id}', 'Petugas\DashboardController@tolak')->name('petugas.tolak.antrian');
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::get('antrian-pelayanan-industrial', 'AntrianController@index')->name('antrian.index');
        Route::post('antrian-pelayanan-industrial', 'AntrianController@store')->name('antrian.store');
        Route::get('get/kantor/{id}', 'KantorController@getKantor')->name('get.kantor');
        Route::get('data-antrian', 'AntrianController@dataAntrian')->name('antrian.data');
        Route::get('data-antrian/detail/{id}', 'AntrianController@detailAntrian')->name('antrian.detail');

    });

Auth::routes();

Route::post('auth/register', 'Auth\RegisterController@register')->name('custom.register');

Route::get('/home', 'HomeController@index')->name('home');
