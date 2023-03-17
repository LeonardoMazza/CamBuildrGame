@extends('layouts.app')
@section('content')

    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-3xl font-bold mb-4">Edit Game</h1>
        <form action="{{ route('games.update', $game) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="sr-only">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $game->name }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="team_blue_score" class="sr-only">Team Blue Score</label>
                <input type="text" name="team_blue_score" id="team_blue_score" placeholder="Team Blue Score" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('team_blue_score') border-red-500 @enderror" value="{{ $game->team_blue_score }}">
                @error('team_blue_score')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="team_red_score" class="sr-only">Team Red Score</label>
                <input type="text" name="team_red_score" id="team_red_score" placeholder="Team Red Score" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('team_red_score') border-red-500 @enderror" value="{{ $game->team_red_score }}">
                @error('team_red_score')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="is_active" class="sr-only">Is Active</label>
                <select name="is_active" id="is_active" class="bg-gray-100 border-2 w-full
                p-4 rounded-lg @error('is_active') border-red-500 @enderror">
                    <option value="1" {{ $game->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$game->is_active ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
            </div>
        </form>
    </div>

@endsection