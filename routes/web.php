<?php

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/', 'SeriesController@index')->name('listar_series');
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/create', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::post('/series/{id}/editar', 'SeriesController@editar');

Route::get('/series/{id}/temporadas', 'TemporadasController@index');
