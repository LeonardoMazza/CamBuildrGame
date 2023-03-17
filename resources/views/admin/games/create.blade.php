@if (Auth::user()->is_admin)
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
      <h1 class="text-3xl font-bold mb-4">Create Game</h1>
      <form action="{{ route('games.store') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="team_blue_score" class="sr-only">Team Blue Score</label>
          <input type="text" name="team_blue_score" id="team_blue_score" placeholder="Team Blue Score" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('team_blue_score') border-red-500 @enderror" value="{{ old('team_blue_score') }}">
          @error('team_blue_score')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="team_red_score" class="sr-only">Team Red Score</label>
          <input type="text" name="team_red_score" id="team_red_score" placeholder="Team Red Score" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('team_red_score') border-red-500 @enderror" value="{{ old('team_red_score') }}">
          @error('team_red_score')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-4">
          <label for="is_active" class="sr-only">Is Active</label>
          <select name="is_active" id="is_active" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('is_active') border-red-500 @enderror">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
          </select>
          @error('is_active')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Create Game</button>
        </div>
      </form>
    </div>
  @endsection
@else
    {{@abort(404)}}
@endif
