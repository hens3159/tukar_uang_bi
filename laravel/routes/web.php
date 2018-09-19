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

Auth::routes();
Route::get('/laporan','AdminController@index')->name('admin');
Route::get('/transaksi-link','TukarUangController@TransaksiLink')->name('home');
Route::get('/laporan-link','AdminController@LaporanLink')->name('admin');
Route::get('/form','TukarUangController@FormTransaksi')->name('home');
Route::get('/ajax-form','TukarUangController@FormTransaksiAjax');
Route::get('/ajax','AdminController@AjaxSearch');
Route::get('/profil', 'AdminController@show');
