<?php
Route::get('/', 'LaporanController@home')->name('dashboard');

Route::resource('laporan','laporanController');
Route::get('/laporan/{id}', 'laporanController@show')->name('laporan.detail');
Route::get('/laporan/download/{lampiran}', 'laporanController@download')->name('laporan.download');
// Route::get('/laporan/pending/{id}', 'laporanController@pending')->name('laporan.pending');
// Route::get('/laporan/verifikasi/{id}', 'laporanController@verifikasi')->name('laporan.verifikasi');
// Route::get('/laporan/proses/{id}', 'laporanController@proses')->name('laporan.proses');
// Route::get('/laporan/complete/{id}', 'laporanController@complete')->name('laporan.complete');

Route::get('/laporan/ditinjau/{id}', 'laporanController@ditinjau')->name('laporan.ditinjau');




