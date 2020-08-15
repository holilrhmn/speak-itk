<?php
Route::get('/', 'HomeController@index')->name('dashboard');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::post('/users/import_excel', 'UserController@import_excel')->name('import.excel');
Route::get('/edit/profil', 'HomeController@editProfil')->name('edit.profil');
Route::post('/update/{user}/profil', 'HomeController@updateProfil')->name('update.profil');

