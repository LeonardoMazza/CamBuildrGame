@extends('layouts.app')
@section('content')
    <div class="absolute top-0 right-0 mt-4 mr-4">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                @if(Auth::user()->is_admin) 
                    <a
                        href="{{ route('dashboard') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Back to dashboard
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
    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-3xl font-bold mb-4">{{$game->name}}</h1>
        <div class="mb-4">
            <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $game->name }}" disabled>
            @error('name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="team_blue_score" class="sr-only">Team Blue Score</label>
            <input type="text" name="team_blue_score" id="team_blue_score" placeholder="Team Blue Score" class="bg-blue-100 border-2 w-full p-4 rounded-lg @error('team_blue_score') border-red-500 @enderror" value="{{ $game->team_blue_score }}" disabled>
            @if ($game->is_active)
            <form action="{{ route('games.vote', $game->id) }}" method="POST">
                @csrf
                <input type="hidden" name="team" value="1">
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Vote</button>
            </form>
            @endif
            @error('team_blue_score')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="team_red_score" class="sr-only">Team Red Score</label>
            <input type="text" name="team_red_score" id="team_red_score" placeholder="Team Red Score" class="bg-red-100 border-2 w-full p-4 rounded-lg @error('team_red_score') border-red-500 @enderror" value="{{ $game->team_red_score }}" disabled>
            @if ($game->is_active)
            <form action="{{ route('games.vote', $game->id) }}" method="POST">
                @csrf
                <input type="hidden" name="team" value="2">
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Vote</button>
            </form>
            @endif
            @error('team_red_score')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-4">
            <label for="is_active" class="sr-only">Is Active</label>
            <td class="px-4 py-2 border border-gray-400 ">
              @if ($game->is_active)
                <span class="bg-green-500 text-white py-1 px-2 rounded">Active</span>
              @else
                <span class="bg-red-500 text-white py-1 px-2 rounded">Inactive</span>
            @endif
            </td>
            @error('is_active')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    

@endsection