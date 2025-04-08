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

Route::middleware(['lang'])->group(function(){
    Route::prefix('acopi')->group(function() {
        Route::get('/index', 'ACOPIController@index')->name('cefa.acopi.index');
        Route::get('/admin/welcome', 'ACOPIController@admin')->name('acopi.admin.welcome');

    });
});