<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GameController extends Controller
{
    public function index()
    {
        $games = Games::all();

        return view('admin.games.index', compact('games'));
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

        $game = Games::findOrFail($game);

        return view('admin.games.show', compact('game'));
    }

    public function edit($game)
    {

        $game = Games::findOrFail($game);

        return view('admin.games.edit', compact('game'));
    }

    public function update($game)
    {

        $game = Games::findOrFail($game);

        $data = request()->validate([
            'name' => 'required',
            'team_blue_score' => 'required',
            'team_red_score' => 'required',
            'is_active' => 'required',
        ]);

        $game->update($data);

        return redirect()->route('dashboard', $game)->with('success', 'Game updated successfully');
    }

    public function destroy($game)
    {

        $game = Games::findOrFail($game);
        $game->delete();


        return redirect()->route('dashboard')->with('success', 'Game deleted successfully');
    }
}
