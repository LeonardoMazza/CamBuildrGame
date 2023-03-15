<!-- if is admin show -->
@if (Auth::user()->is_admin)
    @extends('layouts.app')

    @section('content')
        <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
            <div class="absolute top-0 right-0 mt-4 mr-4">
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a
                                href="{{ route('home') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                            >
                                Visit website
                            </a>
                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                            >
                                Log out
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    @endsection

@endif