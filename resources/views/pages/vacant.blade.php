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
            <div class="text-center text-sm lg:text-2xl font-medium">Вакантные места для приема (перевода) обучающихся</div>
            <div class=" font-semibold"> </i> Версия для слабовидящих</div>
        </div>
        <div class="px-2 py-2">
            <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
                <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Вакантные места для приема (перевода) обучающихся</p>
            </div>
        </div>

        @foreach($subsections as $subsection)
        <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
        <div class="px-6 flex flex-col justify-center items-center">
            @if($subsection->id == 55)
            <table class="text-sm mb-4 text-left">

                <thead class="text-center">
                    <tr class="h-[1rem] bg-blue-100 border border-blue-200">
                        <th rowspan="2" class="w-[15rem] font-medium border-blue-200">Код, шифр группы научных специальностей</th>
                        <th rowspan="2" class="border w-[25rem] font-medium border-blue-200">Наименование профессии, специальности, направления подготовки, наименование группы научных специальностей</th>
                        <th rowspan="2" class="border w-[6rem] font-medium border-blue-200">Уровень образования </th>
                        <th rowspan="2" class="border w-[18rem] font-medium border-blue-200">Образовательная программа, направленность, профиль, шифр и наименование научной специальности </th>
                        <th rowspan="2" class="border w-[5rem] font-medium border-blue-200">Курс</th>
                        <th rowspan="2" class="border w-[6rem] font-medium border-blue-200">Форма обучения</th>
                        <th class="px-4" colspan="4">Количество вакантных мест для приёма (перевода) на места, финансируемые за счет</th>
                    </tr>
                    <tr class="h-[1rem] bg-blue-100 border border-blue-200">
                        <th class="border w-[8rem] font-medium border-blue-200">бюджетных ассигнований федерального бюджета</th>
                        <th class="border w-[11rem] font-medium border-blue-200">бюджетных ассигнований бюджетов субъекта Российской Федерации</th>
                        <th class="border w-[10rem] font-medium border-blue-200">бюджетных ассигнований местных бюджетов</th>
                        <th class="border w-[10rem] font-medium border-blue-200">средств физических и (или) юридических лиц</th>
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
                        <td class="border border-slate-300 text-center text-sm">
                            5
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            6
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            7
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            8
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            9
                        </td>
                        <td class="border border-slate-300 text-center text-sm">
                            10
                        </td>
                    </tr>
                    @foreach ($vacancies as $vacanct)
                    <tr class="h-[3rem] text-justify">
                        <td class="border border-slate-300 px-2 place-items-center">
                            {{ $vacanct->edu_code }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $vacanct->edu_name }}
                        </td>
                        <td class="border border-slate-300 px-2">
                            {{ $vacanct->edu_level }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->edu_prof }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->edu_course }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->edu_form }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->number_bf_vacant }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->number_br_vacant }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->number_bm_vacant }}
                        </td>
                        <td class="border border-slate-300 text-center">
                            {{ $vacanct->number_p_vacant }}
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