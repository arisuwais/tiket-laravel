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
    return view('auth/login');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
    Route::resource('kategori', 'KategoriController');
    Route::resource('tiket', 'TiketController');
    Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::post('transaksi', 'TransaksiController@store')->name('transaksi.store');
    Route::delete('transaksi/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/update', 'TransaksiController@update')->name('transaksi.update');
    Route::get('transaksi/pdf', 'TransaksiController@laporan')->name('transaksi.laporan');
    Route::get('/excel', 'TransaksiController@excel')->name('transaksi.excel');
});
