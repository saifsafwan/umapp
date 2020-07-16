<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UM BUDGET MODULE') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="flex flex-col md:flex-row overflow-hidden h-full md:h-screen">
    <div class="w-full md:w-1/2 overflow-hidden bg-bluetwo">
        <div class="container mx-auto flex justify-center items-center md:h-screen">        
            <div class="flex justify-center">
                <div class="mt-8 mb-8 md:mt-0 md:mb-0 text-center">
                    <div class="w-48 h-auto mx-auto mb-8">
                        <x-svg.homepage/>
                    </div>
                    <h1 class=" text-4xl text-white">UM BUDGET MODULE</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 overflow-hidden">
        <div class="container mt-8 mx-auto px-12 flex justify-center items-center md:h-screen">
            <div class="flex flex-wrap justify-center">
                <div class="w-full max-w-lg">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>