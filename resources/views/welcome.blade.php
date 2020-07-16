@extends('layouts.homescreen')

@section('content')
                        
@if(Route::has('login'))
    <div class="flex justify-center">
        @auth
            <a href="{{ url('/home') }}" class="no-underline  hover:underline text-sm font-normal text-gray-700 uppercase">{{ __('Home') }}</a>
        @else
            <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-gray-700 uppercase pr-6">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-gray-700 uppercase">{{ __('Register') }}</a>
            @endif
        @endauth
    </div>
@endif

@endsection