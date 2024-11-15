<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="theme">

<head>
    <link rel="stylesheet" href="/css/awesome/css/all.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Личный кабинет ИУБиП') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <script src="/build/assets/jquery.js"></script>
    <script src="/build/assets/uhpv-full.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full w-full">
    <div id="app" class="h-full w-full flex flex-col font-sans font-light antialiased">
        <div style="background-color:#174b97" class="h-full w-full flex text-3xl text-white flex-header">
            <div class="flex items-center h-full w-full">
                <img class="w-[10rem] p-2" src="{{ asset('storage/logo_iubip.png') }}">
                <div class="h-full w-full flex items-center justify-center text-center font-semibold flex-grow">Частное образовательное учреждение высшего образования "ЮЖНЫЙ УНИВЕРСИТЕТ (ИУБиП)"</div>
            </div>
        </div>
        <div style="background-color:#386fc2" class="flex bg-blue-200 h-[3rem] p-2 w-full justify-end items-center py-4">
            <i class="px-2 fa-solid fa-eye fa-lg" style="color: #ffffff;"></i><a class="text-right" id="specialButton" style="font-weight: 400; color:white; cursor:pointer;">Версия для слабовидящих</a>
        </div>
        <div class="px-2 py-2">
            <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
                <a href="https://iubip.ru/" class="px-2">Главная</a>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">@yield('subsection-name')</p>
            </div>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>