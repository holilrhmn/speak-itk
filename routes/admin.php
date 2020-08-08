<?php
Route::get('/', 'HomeController@index')->name('dashboard');

Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::post('/users/import_excel', 'UserController@import_excel')->name('import.excel');


