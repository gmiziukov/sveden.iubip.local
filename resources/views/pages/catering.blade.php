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
    <div class="w-full h-full">
        <div class="w-full bg-blue-400 text-2xl flex items-center justify-center text-center text-white font-semibold p-2 h-[7rem]">ФЕДЕРАЛЬНОЕ ГОСУДАРСТВЕННОЕ БЮДЖЕТНОЕ ОБРАЗОВАТЕЛЬНОЕ УЧРЕЖДЕНИЕ ВЫСШЕГО ОБРАЗОВАНИЯ ДОНСКОЙ ГОСУДАРСТВЕННЫЙ ТЕХНИЧЕСКИЙ УНИВЕРСИТЕТ</div>
        <div class="bg-blue-200 text-right p-2 h-[3rem] font-semibold w-full"> </i> Версия для слабовидящих</div>
        <div class="w-full">Организация питания в образовательной организации</div>
        <div class="bg-red-500 w-full">Сведения об условиях питания и охраны здоровья обучающихся</div>

        <div class="px-4 flex flex-col justify-center items-center">
            <table class="text-sm text-left mt-10">
                <thead class="text-center">
                    <tr class="h-[1rem] bg-blue-100 border border-blue-200">
                        <th class="w-[15rem] font-medium border-blue-200">Наименование объекта</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Адрес места нахождения</th>
                        <th class="border w-[6rem] font-medium border-blue-200">Площадь</th>
                        <th class="border w-[6rem] font-medium border-blue-200">Количество мест</th>
                        <th class="border w-[70rem] font-medium border-blue-200">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($data as $means)
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
                    <tr class="h-[3rem]">
                        <td class="border border-slate-300 px-2 place-items-center">
                            {{ $means->obj_name }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $means->obj_address }}
                        </td>
                        <td class="border border-slate-300 px-2 text-center">
                            {{ $means->obj_sq }}
                        </td>
                        <td class="border border-slate-300 px-2 text-center">
                            {{ $means->obj_cnt }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $means->obj_ovz }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table text-sm text-left mt-10">
            <thead class="text-center">
                    <tr class="h-[1rem] bg-blue-100 border border-blue-200">
                        <th class="w-[15rem] font-medium border-blue-200">Наименование объекта</th>
                        <th class="border w-[25rem] font-medium border-blue-200">Адрес места нахождения</th>
                        <th class="border w-[6rem] font-medium border-blue-200">Площадь</th>
                        <th class="border w-[6rem] font-medium border-blue-200">Количество мест</th>
                        <th class="border w-[70rem] font-medium border-blue-200">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($datatwo as $health)
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
                    <tr class="h-[3rem]">
                        <td class="border px-2 place-items-center border-slate-300">
                            {{ $health->obj_name }}
                        </td>
                        <td class="border px-2 border-slate-300">
                            {{ $health->obj_address }}
                        </td>
                        <td class="border px-2 text-center border-slate-300">
                            {{ $health->obj_sq }}
                        </td>
                        <td class="border px-2 text-center border-slate-300">
                            {{ $health->obj_cnt }}
                        </td>
                        <td class="border px-2 border-slate-300">
                            {{ $health->obj_ovz }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</body>

</html>