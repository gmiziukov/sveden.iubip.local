<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app"></div>
    <div class="w-full h-full flex flex-col text-slate-700 ">
        <div class="w-full bg-blue-400 flex text-3xl text-white h-[7rem]">
            <div class="flex items-center w-full">
                <img class="w-[10rem] px-2" src="{{ asset('storage/logo_iubip.png') }}">
                <div class="flex items-center justify-center text-center font-semibold flex-grow">Частное образовательное учреждение высшего образования "ЮЖНЫЙ УНИВЕРСИТЕТ (ИУБиП)"</div>
            </div>
        </div>

        <div class="flex bg-blue-200 h-[3rem] p-2 w-full justify-between items-center py-4">
            <div class="text-center text-sm lg:text-2xl font-medium">Международное сотрудничество</div>
            <div class=" font-semibold"> </i> Версия для слабовидящих</div>
        </div>
        <div class="px-2 py-2">
            <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
                <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Международное сотрудничество</p>
            </div>
        </div>

        @foreach($subsections as $subsection)
        <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
        <div class="px-6 flex flex-col">
            @if($subsection->id == 15)
            <table class="text-sm mb-4 text-left">
                <tbody class="text-slate-600">
                    @foreach ($document as $doc)
                    <tr class="h-[3rem] text-justify">
                        <td class="border border-slate-300 w-[40rem] px-2 place-items-center">
                            {{ $doc->name }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            <a style="color: -webkit-link;" target="_blank" href="{{ asset('storage/'.$doc->path_to_file) }}">{{ $doc->name_file }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
        @endforeach
    </div>
</body>

</html>