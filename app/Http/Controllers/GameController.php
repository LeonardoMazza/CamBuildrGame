<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GameController extends Controller
{
    public function index()
    {
     
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'team_blue_score' => 'required',
            'team_red_score' => 'required',
            'is_active' => 'required',
        ]);

        Games::create($data);

        
        return redirect()->route('dashboard')->with('success', 'Game created successfully');
    }

    public function show($game)
    {
        return view('games.show', compact('game'));
    }

    public function edit($game)
    {
        return view('games.edit', compact('game'));
    }

    public function update($game)
    {
        return redirect()->route('games.show', $game);
    }

    public function destroy($game)
    {

        $game = Games::findOrFail($game);
        $game->delete();


        return redirect()->route('dashboard')->with('success', 'Game deleted successfully');
    }
}
