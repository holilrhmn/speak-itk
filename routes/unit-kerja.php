<?php
Route::get('/', 'LaporanController@home')->name('dashboard');

Route::resource('laporan','LaporanController');
Route::get('/laporan/{id}', 'LaporanController@show')->name('laporan.detail');
Route::get('/laporan/download/{lampiran}', 'LaporanController@download')->name('laporan.download');
// Route::get('/laporan/pending/{id}', 'laporanController@pending')->name('laporan.pending');
// Route::get('/laporan/verifikasi/{id}', 'laporanController@verifikasi')->name('laporan.verifikasi');
// Route::get('/laporan/proses/{id}', 'laporanController@proses')->name('laporan.proses');
// Route::get('/laporan/complete/{id}', 'laporanController@complete')->name('laporan.complete');

Route::get('/laporan/ditinjau/{laporan}', 'LaporanController@ditinjau')->name('laporan.ditinjau');

Route::get('/edit/profil', 'LaporanController@editProfil')->name('edit.profil');
Route::post('/update/{user}/profil', 'LaporanController@updateProfil')->name('update.profil');


