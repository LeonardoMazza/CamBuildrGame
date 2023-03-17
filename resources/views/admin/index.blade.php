<!-- if is admin show -->
@if (Auth::user()->is_admin)
   
@extends('layouts.app')

@section('content')
  <div class="flex flex-col justify-center items-center h-screen">
    <h1 class="text-3xl font-bold mb-4">Game Management</h1>
    <a href="{{ route('games.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
      Create Game
    </a>
    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

    <table class="table-auto border-collapse border border-gray-400">
      <thead>
        <tr>
          <th class="px-4 py-2 border border-gray-400">Name</th>
          <th class="px-4 py-2 border border-gray-400">Team1</th>
          <th class="px-4 py-2 border border-gray-400">Team2</th>
          <th class="px-4 py-2 border border-gray-400">Status</th>
          <th class="px-4 py-2 border border-gray-400">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($games as $game)
          <tr>
            <td class="px-4 py-2 border border-gray-400">{{ $game->name }}</td>
            <td class="px-4 py-2 border border-gray-400">{{ $game->team_blue_score }}</td>
            <td class="px-4 py-2 border border-gray-400">{{ $game->team_red_score }}</td>
            <td class="px-4 py-2 border border-gray-400">
              @if ($game->is_active)
                <span class="bg-green-500 text-white py-1 px-2 rounded">Active</span>
              @else
                <span class="bg-red-500 text-white py-1 px-2 rounded">Inactive</span>
            @endif
            </td>
            <td class="px-4 py-2 border border-gray-400">
              <a href="{{ route('games.edit', $game->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
              <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
              </form>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection

               


@endif