<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\congruenciaFundamentalController;
use App\Http\Controllers\vonNeumannController;
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

Route::get('/',[mainController::class, 'index'])->name('main.index');

/* 
    Rutas de métodos pseudoaleatorios.
*/
// Rutas de Congruencia Fundamental
Route::get('/congruencia-fundamental',[congruenciaFundamentalController::class, 'index'])->name('congruencia.index');

// Rutas de Método Von Neumann
Route::get('/von-neumann',[vonNeumannController::class, 'index'])->name('neumann.index');
Route::post('/von-neumann',[vonNeumannController::class, 'VonNeumann'])->name('neumann.VonNeumann');
