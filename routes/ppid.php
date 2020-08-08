<?php

Route::get('/', 'LaporanController@home')->name('dashboard');

Route::resource('laporan','LaporanController');
Route::get('/laporan/{id}', 'LaporanController@show')->name('laporan.detail');
Route::get('/laporan/download/{lampiran}', 'LaporanController@download')->name('laporan.download');
Route::get('/laporan/pending/{id}', 'LaporanController@pending')->name('laporan.pending');
Route::get('/laporan/verifikasi/{id}', 'LaporanController@verifikasi')->name('laporan.verifikasi');
Route::get('/laporan/proses/{id}', 'LaporanController@proses')->name('laporan.proses');
Route::get('/laporan/complete/{id}', 'LaporanController@complete')->name('laporan.complete');

Route::resource('category','CategoryController');

Route::get('/laporan/informasi/filter', 'InformasiController@index')->name('laporan.informasi');
Route::get('/laporan/informasi/laporan-selesai', 'InformasiController@laporanComplete')->name('laporan.complete');
Route::get('/laporan/informasi/laporan-not-complete', 'InformasiController@notComplete')->name('laporan.notComplete');

Route::match(['get','post'],'/laporan/informasi/search','InformasiController@search')->name('laporan.search');
Route::match(['get','post'],'/filter/dashboard','LaporanController@filterHome')->name('dashboard.filter');

Route::get('/laporan/edit_status/{laporan}', 'LaporanController@editStatus')->name('laporan.edit-status');
Route::put('/laporan/update_status/{laporan}', 'LaporanController@updateStatus')->name('laporan.update-status');

