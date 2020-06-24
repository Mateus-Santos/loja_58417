<?php

Route::get('/', function () {
    return view('inicial');
});

Route::get('/categorias/restaurar/', 'CategoriaController@indexWithTrashed')->name('categorias.restaurar');
Route::get('categorias/restaurar/{id}', 'CategoriaController@restore')->name('categorias.restore');
Route::get('categorias/excluir/{id}', 'CategoriaController@excluirdevez')->name('categorias.excluirdevez');
Route::resource('categorias', 'CategoriaController');
Route::resource('roupas', 'RoupaController');
Route::get('/roupas/{roupa}/editar', 'RoupaController@editar')->name('roupas.editar');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');