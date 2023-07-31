<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Game;
use App\Models\Hand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class HandController extends Controller
{
    public function create(Game $game) {
        return view('next.create', [
        
                // 'hands' => Hand::where('game_id', $game->id)->orderBy('dealer_id')->get(),
                'game' => Game::where('id', $game->id)->get()
        
        ]);
    }

    public function store(Request $request)
    {
        $scores = array($request->north, $request->east, $request->south, $request->west);

        if ($request->contract == 'j' && array_sum($scores) == 500) {
            $request->validate([
                'game_id' => 'required|integer',
                'contract' => 'required',
                'dealer_id' => 'required|integer',
                'north' => 'required|different:east,south,west|min:50|max:200|multiple_of:50|integer',
                'east' => 'required|different:north,south,west|min:50|max:200|multiple_of:50|integer',
                'south' => 'required|different:east,nort,west|min:50|max:200|multiple_of:50|integer',
                'west' => 'required|different:east,south,north|min:50|max:200|multiple_of:50|integer'
            ]);

            Hand::create($request->only(['game_id', 'dealer_id', 'contract', 'north', 'east', 'south', 'west']));

        }
        else if ($request->contract === 'k' && array_sum($scores) == -75) {
            $request->validate([
                'game_id' => 'required|integer',
                'contract' => 'required',
                'dealer_id' => 'required|integer',
                'north' => 'required|min:-75|max:0|multiple_of:75|integer',
                'east' => 'required|min:-75|max:0|multiple_of:75|integer',
                'south' => 'required|min:-75|max:0|multiple_of:75|integer',
                'west' => 'required|min:-75|max:0|multiple_of:75|integer'
            ]);

            Hand::create($request->only(['game_id', 'dealer_id', 'contract', 'north', 'east', 'south', 'west']));

        }
        else if ($request->contract === 'q' && array_sum($scores) == -100) {
            $request->validate([
                'game_id' => 'required|integer',
                'contract' => 'required',
                'dealer_id' => 'required|integer',
                'north' => 'required|min:-100|max:0|multiple_of:25|integer',
                'east' => 'required|min:-100|max:0|multiple_of:25|integer',
                'south' => 'required|min:-100|max:0|multiple_of:25|integer',
                'west' => 'required|min:-100|max:0|multiple_of:25|integer'
            ]);

            Hand::create($request->only(['game_id', 'dealer_id', 'contract', 'north', 'east', 'south', 'west']));
            // return redirect()->route('games/{game}/next', ['game'=> $request->game_id])
            //                 ->with('success','Hand saved successfully.');
           // return back();
        }
        else if ($request->contract === 'nt' && array_sum($scores) == -195) {
            $request->validate([
                'game_id' => 'required|integer',
                'contract' => 'required',
                'dealer_id' => 'required|integer',
                'north' => 'required|min:-195|max:0|multiple_of:15|integer',
                'east' => 'required|min:-195|max:0|multiple_of:15|integer',
                'south' => 'required|min:-195|max:0|multiple_of:15|integer',
                'west' => 'required|min:-195|max:0|multiple_of:15|integer'
            ]);

           Hand::create($request->only(['game_id', 'dealer_id', 'contract', 'north', 'east', 'south', 'west']));
            // return redirect()->route('games/{game}/next', ['game'=> $request->game_id])
            //                 ->with('success','Hand saved successfully.');
           // return back();
        }
        else if ($request->contract === 'd' && array_sum($scores) == -130) {
            $request->validate([
                'game_id' => 'required|integer',
                'contract' => 'required',
                'dealer_id' => 'required|integer',
                'north' => 'required|min:-130|max:0|multiple_of:10|integer',
                'east' => 'required|min:-130|max:0|multiple_of:10|integer',
                'south' => 'required|min:-130|max:0|multiple_of:10|integer',
                'west' => 'required|min:-130|max:0|multiple_of:10|integer'
            ]);

           Hand::create($request->only(['game_id', 'dealer_id', 'contract', 'north', 'east', 'south', 'west']));
            // return redirect()->route('games/{game}/next', ['game'=> $request->game_id])
            //                 ->with('success','Hand saved successfully.');


           // if ($game->hands->count() == 19) {

          // }

           // return back();
        }
            $game = Game::where('id', request()->game_id)->get();

            
            if (DB::table('hands')->where('game_id', request()->game_id)->count() == 20) {

            $n = DB::table('hands')->where('game_id', request()->game_id)->sum('north');
            $e = DB::table('hands')->where('game_id', request()->game_id)->sum('east');
            $s = DB::table('hands')->where('game_id', request()->game_id)->sum('south');
            $w = DB::table('hands')->where('game_id', request()->game_id)->sum('west');

            $attributes = [           
            'final_n' => $n, 
            'final_e' => $e, 
            'final_s' => $s, 
            'final_w' => $w
            ];

            Game::where('id', request()->game_id)->update($attributes);
        
         }

        return back();

    }

}

        // Game::where('id', request()->game_id)->update($game->only([
        //     // 'north_id' => $game->north_id(), 
        //     // 'east_id' => $game->east_id(), 
        //     // 'south_id' => $game->south_id(), 
        //     // 'west_id' => $game->west_id(), 
        //     'final_n' => $n, 
        //     'final_e' => $e, 
        //     'final_s' => $s, 
        //     'final_w' => $w
        // ]));