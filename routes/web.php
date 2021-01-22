<?php


Route::get('/', 'SeriesController@index')->name('listar_series');
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/create', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::get('/series/{id}/temporadas', 'TemporadasController@index');
