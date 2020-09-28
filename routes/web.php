<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['CheckRole:admin']], function(){
    // ADMIN
Route::get('/dashboardadmin','AdminController@dashboardadmin')->name('dashboardadmin');
});


Route::group(['middleware' => ['CheckRole:kasir']], function(){
    // KASIR
Route::get('/dashboardkasir','KasirController@dashboardkasir')->name('dashboardkasir');
});

// MAKANAN
Route::get('/createmakanan/form','MakananController@create');
Route::post('/createmakanan','MakananController@store');
Route::get('/edit/{id_makanan}','MakananController@edit');
Route::put('/update/{id_makanan}','MakananController@update');
Route::get('/hapus/{id_makanan}','MakananController@delete_menu');
Route::get('/makanan','MakananController@showw');
Route::get('/cetakpdf','MakananController@cetak_pdf_makanan');

 
Route::get('/transaksi', 'MakananController@show');

// KASIR
Route::get('/daftar_makanan','MakananController@showdiuser');

Route::get('/beli/{id_makanan}','MakananController@editt');
Route::post('/detailorder','MakananController@storee');
Route::get('/detailorder/{id_makanan}','MakananController@showw');
Route::get('/hapuss/{id_transaksi}','MakananController@delete_transaksi');

Route::get('/cetakpdff','MakananController@cetak_pdf_transaksi');

Route::get('/detailtransaksi/{id_transaksi}','MakananController@edit_transaksi');


