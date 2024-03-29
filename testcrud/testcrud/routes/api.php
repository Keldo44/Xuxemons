<?php

use App\Http\Controllers\EntrenadorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\XuxemonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes with CORS middleware
Route::middleware('cors')->group(function () {
    // mostrar todos pokemon
    Route::get('pokemons', [PokemonController::class, 'index'])->name('pokemons.index');
    // mostrar unph pokemon
    Route::get('pokemons/{id}', [PokemonController::class, 'show'])->name('pokemons.show');
    // CREAR UN POKEMON
    Route::post('pokemons', [PokemonController::class, 'store'])->name('pokemons.store');
    // update
    Route::put('pokemons/{id}', [PokemonController::class, 'update'])->name('pokemons.update');
    // delete
    Route::delete('pokemons/{id}', [PokemonController::class, 'destroy'])->name('pokemons.destroy');

    Route::get('entrenadores', [EntrenadorController::class, 'index'])->name('entrenadores.index');
    // mostrar unph pokemon
    Route::get('entrenadores/{id}', [EntrenadorController::class, 'show'])->name('entrenadores.show');
    // CREAR UN POKEMON
    Route::post('entrenadores', [EntrenadorController::class, 'store'])->name('entrenadores.store');
    // update
    Route::put('entrenadores/{id}', [EntrenadorController::class, 'update'])->name('entrenadores.update');
    // delete
    Route::delete('entrenadores/{id}', [EntrenadorController::class, 'destroy'])->name('entrenadores.destroy');

    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::post('register', [LoginController::class, 'register'])->name('register');

    Route::get('xuxemons', [XuxemonController::class, 'index']);
});

// Routes with Sanctum authentication middleware
Route::middleware('auth:sanctum')->group(function () {
    // Example route with authentication
    Route::get('/user', function () {
        return auth()->user();
    });
});
