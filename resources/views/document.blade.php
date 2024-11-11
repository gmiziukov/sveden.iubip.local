@extends('layouts.app')

@section('content')
<div class="px-2 py-2">
    <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
        <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Документы</p>
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
@stop