<!-- if is admin show -->
@if (Auth::user()->is_admin)
   
@extends('layouts.app')

@section('content')
  <div class="flex flex-col justify-center items-center h-screen">
    <h1 class="text-3xl font-bold mb-4">Game Management</h1>
    <a href="{{ route('games.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
      Create Game
    </a>
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

    </table>
    </div>
@endsection

               


@endif