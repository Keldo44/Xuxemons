<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\XuxemonController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::middleware('cors')->group(function () {
    //funcionalidad de pokemons
    Route::resource('pokemons', PokemonController::class);
    //Route::put('pokemons/{id}', 'PokemonController@update')->name('pokemons.update');
    //Route::delete('pokemons/{id}', 'PokemonController@destroy')->name('pokemons.destroy');
    //entrenadores
    Route::resource('entrenadores', EntrenadorController::class);

    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('register', [LoginController::class, 'register'])->name('register');
    Route::resource('xuxemons', XuxemonController::class);
    Route::post('xuxemons/catch',[XuxemonController::class, 'catchRand']);

    Route::get('xuxedex', [XuxemonController::class, 'getXuxedex']);

    Route::get('role', [LoginController::class, 'getRole']);
});


