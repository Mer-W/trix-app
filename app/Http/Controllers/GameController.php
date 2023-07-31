<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Redirect;

class GameController extends Controller
{
    public function create() {
        return view('new.create', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request) //: RedirectResponse 
    {
         $request->validate([

              'north_id' => 'required|different:east_id,south_id,west_id|integer|exists:users,id',
              'east_id' => 'required|different:north_id,south_id,west_id|integer|exists:users,id',
              'south_id' => 'required|different:east_id,north_id,west_id|integer|exists:users,id',
              'west_id' => 'required|different:east_id,south_id,north_id|integer|exists:users,id'

         ]);
        $game = Game::create($request->only(['date', 'north_id', 'east_id', 'south_id', 'west_id']));

        // return redirect()->route('past.games', [
        
        //         'games' => Game::all()
        //     ]);
                 
        return to_route('/games');
    }

    public function update() {

        $attributes = request()->validate([

            'north_id' => 'required|different:east_id,south_id,west_id|integer|exists:users,id',
            'east_id' => 'required|different:north_id,south_id,west_id|integer|exists:users,id',
            'south_id' => 'required|different:east_id,north_id,west_id|integer|exists:users,id',
            'west_id' => 'required|different:east_id,south_id,north_id|integer|exists:users,id',
            'final_n' => 'integer|min:-1800|max:2800',
            'final_e' => 'integer|min:-1800|max:2800',
            'final_s' => 'integer|min:-1800|max:2800',
            'final_w' => 'integer|min:-1800|max:2800'

        ]);

        if ($attributes['final_n'] + $attributes['final_e'] + $attributes['final_s'] + $attributes['final_w'] === 0) {
            request()->update($attributes);
        }

    

    }

}
