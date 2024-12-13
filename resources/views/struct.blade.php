@extends('layouts.app')
@section('subsection-name')
Структура и органы управления образовательной организацией
@endsection
@section('content')

<div class="px-4 w-full h-full flex flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg text-lg px-2 w-full">{{ $subsection->name }}</div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 12)
        <table class="md:text-base text-sm mb-4 text-left">
            <thead class="text-center">
                <tr class="h-[1rem] bg-slate-200 border border-gray-300">
                    <th class="w-[15rem] md:font-semibold font-normal border-gray-300">Наименование органа управления / структурного подразделения</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">ФИО руководителя структурного подразделения</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Должность руководителя структурного подразделения</th>
                    <th class="border w-[20rem] md:font-semibold font-normal border-gray-300">Адрес местонахождения органа управления / структурного подразделения</th>
                    <th class="border w-[20rem] md:font-semibold font-normal border-gray-300">Адрес официального сайта органа управления / структурного подразделения</th>
                    <th class="border w-[20rem] md:font-semibold font-normal border-gray-300">Адреса электронной почты органа управления / структурного подразделения</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Положения об органе управления / о структурном подразделении</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 text-center">1</td>
                    <td class="border border-gray-300 text-center">2</td>
                    <td class="border border-gray-300 text-center">3</td>
                    <td class="border border-gray-300 text-center">4</td>
                    <td class="border border-gray-300 text-center">5</td>
                    <td class="border border-gray-300 text-center">6</td>
                    <td class="border border-gray-300 text-center">7</td>
                </tr>
                @foreach ($structureBase as $base)
                <tr itemprop="structOrgUprav" class="h-[3rem] text-justify">
                    <td itemprop="name" class="border border-gray-300 px-2">{{ $base->name }}</td>
                    <td itemprop="fio" class="border border-gray-300 px-2">{{ $base->fio }}</td>
                    <td itemprop="post" class="border border-gray-300 px-2">{{ $base->post }}</td>
                    <td itemprop="addressStr" class="border border-gray-300 px-2">{{ $base->address_str }}</td>
                    <td itemprop="site" class="border border-gray-300 px-2">{{ $base->site }}</td>
                    <td itemprop="email" class="border border-gray-300 px-2">{{ $base->email }}</td>
                    <td itemprop="divisionClauseDocLink" class="border border-gray-300 px-2">
                        @foreach($structureBase as $file)
                        <a style="color: -webkit-link;" target="_blank" href="{{ asset($file->path_to_file) }}">{{ $file->name_file }}</a>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 13)
        <table class="table mb-4 md:text-base text-sm text-left">
            <thead class="text-center">
                <tr class="h-[1rem] bg-slate-200 border border-gray-300">
                    <th class="w-[15rem] md:font-semibold font-normal border-gray-300">Наименование филиала</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">ФИО руководителя</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Должность руководителя</th>
                    <th class="border w-[20rem] md:font-semibold font-normal border-gray-300">Адрес местонахождения</th>
                    <th class="border w-[10rem] md:font-semibold font-normal border-gray-300">Электронная почта</th>
                    <th class="border w-[30rem] md:font-semibold font-normal border-gray-300">Адрес официального сайта или страницы филиала в сети «Интернет» (при наличии)</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Положение о филиале</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($structureBranches as $branches)
                <tr>
                    <td class="border border-gray-300 text-center ">1</td>
                    <td class="border border-gray-300 text-center ">2</td>
                    <td class="border border-gray-300 text-center ">3</td>
                    <td class="border border-gray-300 text-center ">4</td>
                    <td class="border border-gray-300 text-center ">5</td>
                    <td class="border border-gray-300 text-center ">6</td>
                    <td class="border border-gray-300 text-center ">7</td>
                </tr>
                <tr itemprop="filInfo" class="h-[2rem] text-justify">
                    <td itemprop="nameFil" class="border border-gray-300 px-2">{{ $branches->name_fill }}</td>
                    <td itemprop="fioFil" class="border border-gray-300 px-2">{{ $branches->fio }}</td>
                    <td itemprop="postFil" class="border border-gray-300 px-2">{{ $branches->post }}</td>
                    <td itemprop="addressFil" class="border border-gray-300 px-2">{{ $branches->address_fill }}</td>
                    <td itemprop="emailFil" class="border border-gray-300 px-2">{{ $branches->email_fill }}</td>
                    <td itemprop="websiteFil" class="border border-gray-300 px-2">{{ $branches->website_fill }}</td>
                    <td itemprop="divisionClauseDocLink" class="border border-gray-300 px-2">@foreach($structureBranches as $file)
                        <a style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 14)
        <table class="table md:text-base mb-4 text-sm text-left">
            <thead class="text-center">
                <tr class="h-[1rem] bg-slate-200 border border-gray-300">
                    <th class="w-[15rem] md:font-semibold font-normal border-gray-300">Наименование представительства</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">ФИО руководителя</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Должность руководителя</th>
                    <th class="border w-[20rem] md:font-semibold font-normal border-gray-300">Адрес местонахождения</th>
                    <th class="border w-[10rem] md:font-semibold font-normal border-gray-300">Электронная почта</th>
                    <th class="border w-[30rem] md:font-semibold font-normal border-gray-300">Адрес официального сайта или страницы представительства в сети «Интернет» (при наличии)</th>
                    <th class="border w-[15rem] md:font-semibold font-normal border-gray-300">Положение о представительстве</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($structureOffices as $offices)
                <tr>
                    <td class="border border-gray-300 text-center ">1</td>
                    <td class="border border-gray-300 text-center ">2</td>
                    <td class="border border-gray-300 text-center ">3</td>
                    <td class="border border-gray-300 text-center ">4</td>
                    <td class="border border-gray-300 text-center ">5</td>
                    <td class="border border-gray-300 text-center ">6</td>
                    <td class="border border-gray-300 text-center ">7</td>
                </tr>
                <tr itemprop="repInfo" class="h-[2rem] text-justify">
                    <td itemprop="nameRep" class="border border-gray-300 px-2">{{ $offices->name_rep }}</td>
                    <td itemprop="fioRep" class="border border-gray-300 px-2">{{ $offices->fio }}</td>
                    <td itemprop="postRep" class="border border-gray-300 px-2">{{ $offices->post }}</td>
                    <td itemprop="addressRep" class="border border-gray-300 px-2">{{ $offices->address_rep }}</td>
                    <td itemprop="emailRep" class="border border-gray-300 px-2">{{ $offices->email_rep }}</td>
                    <td itemprop="websiteRep" class="border border-gray-300 px-2">{{ $offices->website_rep }}</td>
                    <td itemprop="divisionClauseDocLink" class="border border-gray-300 px-2">
                        @foreach($structureOffices as $file)
                        <a style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    @endforeach
</div>
@stop