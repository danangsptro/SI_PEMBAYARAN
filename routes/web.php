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


Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/admin/home'));
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('/home', 'dashboardAdminController@index')->name('home');
    Route::prefix('siswa')->group( function () {
        Route::get('/', 'SiswaController@index');
        Route::post('/store/{id?}', 'SiswaController@storeSiswa');
        Route::get('/delete/{id}', 'SiswaController@deleteSiswa');
        Route::get('/set-profile/{id}', 'SiswaController@settingProfile');
        Route::post('/update-profile/{id}', 'SiswaController@updateProfile');
    });

    Route::prefix('pembayaran')->group( function () {
        Route::get('/', 'PembayaranController@index');
        Route::post('/store/{id?}', 'PembayaranController@storePembayaran');
        Route::get('/delete/{id}', 'PembayaranController@deletePembayaran');
    });

    // Route::prefix('pembayaran-spp')->group( function () {
    //     Route::get('/', 'PembayaranController@index');
    //     Route::post('/store/{id?}', 'PembayaranController@storePembayaran');
    //     Route::get('/delete/{id}', 'PembayaranController@deletePembayaran');
    // });

    Route::prefix('transaksi')->group( function () {
        Route::get('/', 'TransaksiController@index');
        Route::post('/store', 'TransaksiController@storeTransaksi');
        Route::get('/delete/{id}', 'TransaksiController@deleteTransaksi');
        Route::get('/report/{id}', 'TransaksiController@reportTransaksi');
        Route::get('/transaksi-siswa/{id}', 'TransaksiController@reportTransaksiSiswa');
        Route::get('/invoice-pdf/{id}', 'TransaksiController@reportTransaksiSiswaInvoice');
    });
});

Auth::routes();
