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
            <div class="text-center text-sm lg:text-2xl font-medium">Руководство</div>
            <div class=" font-semibold"> </i> Версия для слабовидящих</div>
        </div>
        <div class="px-2 py-2">
            <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
                <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Руководство</p>
            </div>
        </div>



        @foreach($subsections as $subsection)
        <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
        <div class="px-6 flex flex-col justify-center items-center">
            @if($subsection->id == 32)
            <table class="text-sm mb-4 text-left">
                <thead class="text-center">
                    <tr class="h-[2rem] bg-blue-100 border border-blue-200">
                        <th class="w-[26rem] font-medium border-blue-200">Ф.И.О.</th>
                        <th class="border w-[42rem] font-medium border-blue-200">Должность</th>
                        <th class="border w-[26rem] font-medium border-blue-200">Контактные телефоны</th>
                        <th class="border w-[26rem] font-medium border-blue-200">Адрес электронной почты</th>
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
                    @foreach ($managerBase as $base)
                    <tr itemprop="rucovodstvo" class="h-[2rem] text-justify">
                        <td itemprop="fio" class="border py-2 border-slate-300 px-2 place-items-center">
                            @foreach($managerFiles as $file)
                            @if($file->id == $base->id)
                            <img style="width:150px;border-radius:5%" src="{{ Storage::url($file->path_to_file)}}" alt="{{$file->name_file}}"></img>
                            @endif
                            @endforeach
                            {{ $base->fio }}
                        </td>
                        <td itemprop="post" class="border border-slate-300 px-2">
                            {{ $base->post }}
                        </td>
                        <td itemprop="telephone" class="border border-slate-300 text-center px-2">
                            {{ $base->telephone }}
                        </td>
                        <td itemprop="email" class="border border-slate-300 text-center px-2">
                            {{ $base->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($subsection->id == 33)
            <table class="table mb-4 text-sm text-left">
                <thead class="text-center">
                    <tr class="h-[2rem] bg-blue-100 border border-blue-200">
                        <th class="w-[25rem] font-medium border-blue-200">Наименование филиала</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Ф.И.О.</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Должность</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Контактные телефоны</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Адрес электронной почты</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($managerBranches as $branches)
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
                        <td class="border border-slate-300 text-center text-sm">
                            5
                        </td>
                    </tr>
                    <tr itemprop="rucovodstvoFil" class="h-[2rem] text-justify">
                        <td itemprop="nameFil" class="border px-2 place-items-center border-slate-300">
                            {{ $branches->name_fill }}
                        </td>
                        <td itemprop="fio" class="border px-2 border-slate-300">
                            {{ $branches->fio }}
                        </td>
                        <td itemprop="post" class="border px-2 border-slate-300">
                            {{ $branches->post }}
                        </td>
                        <td itemprop="telephone" class="border px-2 border-slate-300">
                            {{ $branches->telephone }}
                        </td>
                        <td itemprop="email" class="border px-2 border-slate-300">
                            {{ $branches->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
            @if($subsection->id == 33)
            <table class="table text-sm mb-4 text-left">
                <thead class="text-center">
                    <tr class="h-[2rem] bg-blue-100 border border-blue-200">
                        <th class="w-[25rem] font-medium border-blue-200">Наименование представительства</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Ф.И.О.</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Должность</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Контактные телефоны</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Адрес электронной почты</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($managerOffices as $offices)
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
                        <td class="border border-slate-300 text-center text-sm">
                            5
                        </td>
                    </tr>
                    <tr itemprop="rucovodstvoZam" class="h-[2rem] text-justify">
                        <td itemprop="name" class="border px-2 place-items-center border-slate-300">
                            {{ $offices->name_organization }}
                        </td>
                        <td itemprop="fio" class="border px-2 border-slate-300">
                            {{ $offices->fio }}
                        </td>
                        <td itemprop="post" class="border px-2 border-slate-300">
                            {{ $offices->post }}
                        </td>
                        <td itemprop="telephone" class="border px-2 border-slate-300">
                            {{ $offices->telephone }}
                        </td>
                        <td itemprop="email" class="border px-2 border-slate-300">
                            {{ $offices->email }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        @endforeach

</body>

</html>