@extends('layouts.app')
@section('subsection-name')
Руководство
@endsection
@section('content')

<div class="px-4 w-full h-full flex flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 32)
        <table class="text-sm text-left">
            <thead class="text-center">
                <tr class="h-[2rem] md:text-base text-sm bg-slate-200 border border-gray-300">
                    <th class="w-[26rem] md:font-semibold font-normal border-gray-300">Ф.И.О.</th>
                    <th class="border w-[42rem] md:font-semibold font-normal border-gray-300">Должность</th>
                    <th class="border w-[26rem] md:font-semibold font-normal border-gray-300">Контактные телефоны</th>
                    <th class="border w-[26rem] md:font-semibold font-normal border-gray-300">Адрес электронной почты</th>
                </tr>
            </thead>
            <tbody>
                <tr class="md:text-base text-sm">
                    <td class="border text-center">1</td>
                    <td class="border text-center">2</td>
                    <td class="border text-center">3</td>
                    <td class="border text-center">4</td>
                </tr>
                @foreach ($managerBase as $base)
                <tr itemprop="rucovodstvo" class="h-[2rem] md:text-base text-sm text-justify">
                    <td itemprop="fio" class="border py-2 text-center border-gray-300 px-2 place-items-center">
                        @foreach($managerFiles as $file)
                        @if($file->id == $base->id)
                        <img class="md:block hidden" style="width:150px;border-radius:5%" src="{{ Storage::url($file->path_to_file)}}" alt="{{$file->name_file}}"></img>
                        @endif
                        @endforeach
                        {{ $base->fio }}
                    </td>
                    <td itemprop="post" class="border border-gray-300 px-2">{{ $base->post }}</td>
                    <td itemprop="telephone" class="border border-gray-300 px-2">{{ $base->telephone }}</td>
                    <td itemprop="email" class="border border-gray-300 px-2">{{ $base->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 33)
        <table class="table mb-4 md:text-base text-sm text-left">
            <thead class="text-center">
                <tr class="h-[2rem] md:text-base bg-slate-200 border border-gray-300">
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Наименование филиала</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Ф.И.О.</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Должность</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Контактные телефоны</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Адрес электронной почты</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($managerBranches as $branches)
                <tr>
                    <td class="border text-center text-sm">1</td>
                    <td class="border text-center text-sm">2</td>
                    <td class="border text-center text-sm">3</td>
                    <td class="border text-center text-sm">4</td>
                    <td class="border text-center text-sm">5</td>
                </tr>
                <tr itemprop="rucovodstvoFil" class="h-[2rem] md:text-base text-sm text-justify">
                    <td itemprop="nameFil" class="border border-gray-300 px-2">{{ $branches->name_fill }}</td>
                    <td itemprop="fio" class="border border-gray-300 px-2">{{ $branches->fio }}</td>
                    <td itemprop="post" class="border border-gray-300 px-2">{{ $branches->post }}</td>
                    <td itemprop="telephone" class="border border-gray-300 px-2">{{ $branches->telephone }}</td>
                    <td itemprop="email" class="border border-gray-300 px-2">{{ $branches->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 33)
        <table class="table mb-4 md:text-base text-sm text-left">
            <thead class="text-center">
                <tr class="h-[2rem] bg-slate-200 border border-gray-300">
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Наименование представительства</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Ф.И.О.</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Должность</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Контактные телефоны</th>
                    <th class="border w-[25rem] md:font-semibold font-normal border-gray-300">Адрес электронной почты</th>
                </tr>
            </thead>
            <tbody class="text-slate-600">
                @foreach ($managerOffices as $offices)
                <tr>
                    <td class="border text-center text-sm">1</td>
                    <td class="border text-center text-sm">2</td>
                    <td class="border text-center text-sm">3</td>
                    <td class="border text-center text-sm">4</td>
                    <td class="border text-center text-sm">5</td>
                </tr>
                <tr itemprop="rucovodstvoZam" class="h-[2rem] text-justify">
                    <td itemprop="name" class="border px-2">{{ $offices->name_organization }}</td>
                    <td itemprop="fio" class="border px-2">{{ $offices->fio }}</td>
                    <td itemprop="post" class="border px-2">{{ $offices->post }}</td>
                    <td itemprop="telephone" class="border px-2">{{ $offices->telephone }}</td>
                    <td itemprop="email" class="border px-2">{{ $offices->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    @endforeach
</div>
@stop