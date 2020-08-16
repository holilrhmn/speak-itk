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

Route::get('/', 'Frontend\LaporController@create')->name('homepage');
Route::post('/lapor', 'Frontend\LaporController@store')->name('lapor.store')->middleware('auth');

Auth::routes();

Route::get('/auth/{provider}', 'Auth\SocialiteController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\SocialiteController@handleProvideCallback');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/lapor', 'Users\LaporController@index')->name('lapor')->middleware('auth');
Route::get('/lapor/{laporan}', 'Users\LaporController@show')->name('show')->middleware('auth');
Route::post('/lapor/review/{id}', 'Users\LaporController@update')->name('lapor.review')->middleware('auth');
Route::delete('/lapor/destroy/{laporan}', 'Users\LaporController@destroy')->name('laporan.destroy')->middleware('auth');
Route::get('/edit/profil', 'HomeController@editProfil')->name('edit.profil');
Route::post('/update/{user}/profil', 'HomeController@updateProfil')->name('update.profil');
Route::get('/lapor/download/{lampiran}', 'Users\LaporController@download')->name('lapor.download');
