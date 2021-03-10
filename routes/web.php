<?php

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'SeriesController@index')->name('listar_series');
Route::get('/series', 'SeriesController@index')->name('listar_series');
Route::get('/series/create', 'SeriesController@create')->name('form_criar_serie');
Route::post('/series/create', 'SeriesController@store');
Route::delete('/series/{id}', 'SeriesController@destroy');
Route::get('/series/{id}/editar', 'SeriesController@editar')->name('editar_serie');
Route::post('/series/{id}/editar', 'SeriesController@editarPost')->name('editar_serie_post');

Route::get('/series/{id}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporada/{temporada}/episodios/assistidos', 'EpisodiosController@assistidos');

Route::get('/mail', function () {
    return new \App\Mail\NovaSerie("Breack","3","4");
});

Route::get('/sendmail', function () {
    $email = new \App\Mail\NovaSerie("Breack","3","4");
    $email->subject = 'Nova Série Criada';
    $user = (object)["email"=>"leocd@gmail.com","name"=>"Leopoldo"];
    Illuminate\Support\Facades\Mail::to($user)->send($email);
    return "Email enviado";
     
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
