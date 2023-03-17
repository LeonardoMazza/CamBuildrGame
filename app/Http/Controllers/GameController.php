<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('admin.games.index');
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store()
    {
        return redirect()->route('games.index');
    }

    public function show($game)
    {
        return view('admin.games.show', compact('game'));
    }

    public function edit($game)
    {
        return view('admin.games.edit', compact('game'));
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
