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
            @if($subsection->id == 56)
            <table class="text-sm mb-4 text-left">
                <thead class="text-center">
                    <tr class="h-[3rem] bg-blue-100 border border-blue-200">
                        <th class="w-[5rem] font-medium border-blue-200">№ п/п</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Государство</th>
                        <th class="border w-[35rem] font-medium border-blue-200">Наименование организации</th>
                        <th class="border w-auto font-medium border-blue-200">Реквизиты договора (наименование, дата, номер, срок действия)</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    <tr>
                        <td class="border border-slate-300 text-center text-sm">
                            1
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            2
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            3
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            4
                        </td>
                    </tr>
                    @foreach ($inter as $international)
                    <tr class="h-[3rem] text-justify">
                        <td class="border border-slate-300 px-2 text-center place-items-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $international->state_name }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $international->org_name }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $international->dog_reg }}
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