@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                    @if(Auth::user()->is_admin) 
                        <a
                            href="{{ route('dashboard') }}"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Dashboard
                        </a>
                    
                    @endif
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
            <!-- Game Results -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Game Results</h1>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-400">Name</th>
                        <th class="px-4 py-2 border border-gray-400">Team Blue</th>
                        <th class="px-4 py-2 border border-gray-400">Team Red</th>
                        <th class="px-4 py-2 border border-gray-400">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    @if ($game->is_active)
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">{{ $game->name }}</td>
                        <td class="px-4 py-2 border border-gray-400 bg-blue-500 text-white">{{ $game->team_blue_score }}</td>
                        <td class="px-4 py-2 border border-gray-400 bg-red-500 text-white">{{ $game->team_red_score }}</td>
                        <td class="px-4 py-2 border border-gray-400">
                        </td>
                        <td class="px-4 py-2 border border-gray-400">
                            <a href="{{ route('games.show', $game->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded">View</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
