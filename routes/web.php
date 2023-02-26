<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/lista-pessoas','App\Http\Controllers\pessoaController@index');
Route::post('/insert-pessoas', 'App\Http\Controllers\pessoaController@store');
Route::post('/update-pessoas/{id}','App\Http\Controllers\pessoaController@update');
Route::get('/softdelete-pessoas/{id}','App\Http\Controllers\pessoaController@softDelete');

