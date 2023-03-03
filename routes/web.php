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
    return view('welcome');
});

// Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');

Auth::routes();

Route::get('/beranda', 'BerandaController@index')->name('beranda');


// Pengaduan
Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
Route::get('/pengaduan/create', 'PengaduanController@create');
Route::post('/pengaduan/store', 'PengaduanController@store');
Route::get('/pengaduan/status/{id}', 'PengaduanController@status');
Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit');
Route::put('/pengaduan/update/{id}', 'PengaduanController@update');
Route::get('/pengaduan/destroy/{id}', 'PengaduanController@destroy');

// Tanggapan
Route::get('/tanggapan', 'TanggapanController@index')->name('tanggapan');
Route::get('/tanggapan/create', 'TanggapanController@create');
Route::post('/tanggapan/store', 'TanggapanController@store');

Route::get('/home', 'HomeController@index')->name('home');