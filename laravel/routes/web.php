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
    return view('auth.index');
});


//Route::resource('laporan', 'TukarUangController');

Route::get('/laporan','TukarUangController@index')->name('admin');
Route::get('/transaksi-link','TukarUangController@TransaksiLink')->name('home');
Route::get('/laporan-link','TukarUangController@LaporanLink')->name('admin');
Route::get('/form','TukarUangController@FormTransaksi')->name('home');
Route::get('/ajax-form','TukarUangController@FormTransaksiAjax');
Route::get('/ajax','TukarUangController@AjaxSearch');
Route::get('/profil', 'TukarUangController@show');

Auth::routes();
