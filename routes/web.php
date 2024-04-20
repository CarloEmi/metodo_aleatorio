<?php

use Illuminate\Support\Facades\Route;
//se App\Http\Controllers\VonNeumannController;
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

    
Route::get('/prueba-von-neumann', 'VonNeumannController@pruebaVonNeumann');

//Route::get('prueba-von-neumann/{pares_iguales}/{primer_menor_segundo}/{segundo_menor_primer}', 'VonNeumannController@pruebaVonNeumann')->name('prueba');
//Route::get('/prueba-von-neumann', [VonNeumannController::class, 'pruebaVonNeumann']);