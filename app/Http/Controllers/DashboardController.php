<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;


class DashboardController extends Controller
{
    public function index()
    {
           
        $games = Games::all();

        return view('admin.index', compact('games'));
    }
}
