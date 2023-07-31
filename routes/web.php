<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HandController;
use Illuminate\Support\Facades\Route;
use App\Models\Game;
use App\Models\Hand;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/games', function () {
    return view('past.games', [
        'games' => Game::all()
    ]);
});

Route::get('games/{game}', function (Game $game) {
    return view('past.hands', [
        'hands' => Hand::where('game_id', $game->id)->orderBy('dealer_id')->get(),
        'games' => Game::where('id', $game->id)->get()
    ]);
})->whereNumber('game');

Route::get('games/{game}/next', function (Game $game) {
    return view('next.create', [
        'game' => Game::where('id', $game->id)->get()
    ]);
})->whereNumber('game');

Route::post('/new', [GameController::class, 'store']);

Route::post('games/{game}/next', [HandController::class, 'store']);

Route::get('/new', [GameController::class, 'create']);
return view('new.create');