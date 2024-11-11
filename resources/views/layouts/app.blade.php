<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="theme">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Личный кабинет ИУБиП') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="w-full h-screen flex flex-col text-gray-600 font-sans font-light antialiased">
        <div class="w-full bg-blue-400 flex text-3xl text-white h-[7rem]">
            <div class="flex items-center w-full">
                <img class="w-[10rem] px-2" src="{{ asset('storage/logo_iubip.png') }}">
                <div class="flex items-center justify-center text-center font-semibold flex-grow">Частное образовательное учреждение высшего образования "ЮЖНЫЙ УНИВЕРСИТЕТ (ИУБиП)"</div>
            </div>
        </div>
        <div class="flex bg-blue-200 h-[3rem] p-2 w-full justify-between items-center py-4">
            <a itemprop="copy" href="#">Версии для слабовидящих</a>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>