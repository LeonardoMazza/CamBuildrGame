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
        return view('games.create');
    }

    public function store()
    {
        return redirect()->route('games.index');
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
        return redirect()->route('games.index');
    }
}
