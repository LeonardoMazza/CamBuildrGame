<!-- if is admin show -->
@if (Auth::user()->is_admin)

    @extends('layouts.app')

    @section('content')
    <div class="absolute top-0 right-0 mt-4 mr-4">
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                @if(Auth::user()->is_admin) 
                    <a
                        href="{{ route('home') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Back to site
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
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Game Management</h1>
        <a href="{{ route('games.create') }}" class="block mx-auto w-full md:w-1/2 lg:w-1/3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            Create Game
        </a>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-400">Name</th>
                        <th class="px-4 py-2 border border-gray-400">Team Blue</th>
                        <th class="px-4 py-2 border border-gray-400">Team Red</th>
                        <th class="px-4 py-2 border border-gray-400">Status</th>
                        <th class="px-4 py-2 border border-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                    <tr>
                        <td class="px-4 py-2 border border-gray-400">{{ $game->name }}</td>
                        <td class="px-4 py-2 border border-gray-400 bg-blue-500 text-white">{{ $game->team_blue_score }}</td>
                        <td class="px-4 py-2 border border-gray-400 bg-red-500 text-white">{{ $game->team_red_score }}</td>
                        <td class="px-4 py-2 border border-gray-400">
                        @if ($game->is_active)
                            <span class="bg-green-500 text-white py-1 px-2 rounded">Active</span>
                        @else
                            <span class="bg-red-500 text-white py-1 px-2 rounded">Inactive</span>
                        @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-400">
                        <div class="flex flex-wrap justify-center items-center">
                            <a href="{{ route('games.edit', $game->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mx-1 mb-1 md:mb-0">Edit</a>
                            <a href="{{ route('games.show', $game->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mx-1 mb-1 md:mb-0">View</a>
                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mx-1 mb-1 md:mb-0">Delete</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
@else
    {{@abort(404)}}
@endif