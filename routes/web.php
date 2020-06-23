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

/*
Route::get('/admin', 'AuthController@dashboard')->name('admin');
Route::get('/admin/login', 'AuthController@showLoginForm')->name('admin.login');
Route::get('/admin/logout', 'AuthController@logout')->name('admin.logout');
Route::post('/admin/login/do', 'AuthController@login')->name('admin.login.do');
*/

Route::get('/categorias/restaurar/', 'CategoriaController@indexWithTrashed')->name('categorias.restaurar');
Route::get('categorias/restaurar/{id}', 'CategoriaController@restore')->name('categorias.restore');
Route::get('categorias/excluir/{id}', 'CategoriaController@excluirdevez')->name('categorias.excluirdevez');
Route::resource('categorias', 'CategoriaController');
Route::resource('roupas', 'RoupaController');
Route::get('/roupas/{roupa}/editar', 'RoupaController@editar')->name('roupas.editar');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');