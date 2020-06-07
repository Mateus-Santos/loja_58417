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

Route::get('/', function () {
    return view('inicial');
});
/*Route::get('/categorias', "CategoriaController@index");
Route::get('/categoria/editar/{id}', "CategoriaController@edit");
Route::get('/categoria/cadastro', "CategoriaController@create");
Route::post('/categoria', "CategoriaController@store");*/

Route::get('/categorias/restaurar/', 'CategoriaController@indexWithTrashed')->name('categorias.restaurar');
Route::get('categorias/restaurar/{id}', 'CategoriaController@restore')->name('categorias.restore');
Route::get('categorias/excluir/{id}', 'CategoriaController@excluirdevez')->name('categorias.excluirdevez');
Route::resource('categorias', 'CategoriaController');
Route::resource('roupas', 'RoupaController');