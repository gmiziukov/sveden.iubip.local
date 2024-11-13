@extends('layouts.app')

@section('content')
<div class="px-2 py-2">
    <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
        <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Платные образовательные услуги</p>
    </div>
</div>
@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">
    @if($subsection->id == 51)
    @php $groupedFiles = collect($paidEduFile)->groupBy('name'); @endphp
    <table class="text-sm mb-4 text-left">
        <tbody>
            @foreach ($groupedFiles as $name => $files)
            <tr class="h-[3rem] text-justify">
                <td class="border w-[50rem] px-2 place-items-center" itemprop="name">{{ $name }}</td>
                <td class="border px-2">
                    @foreach ($files as $file)
                    <li class="list-none" >
                        <a
                            @if ($name=='Порядок оказания платных образовательных услуг в виде электронного документа, подписанного электронной подписью' )
                            itemprop="paidEdu"
                            @elseif ($name=='Образцы договоров об оказании платных образовательных услуг' )
                            itemprop="paidDog"
                            @elseif ($name=='Документы об утверждении стоимости обучения по каждой образовательной программе в виде электронных документов, подписанные электронной подписью' )
                            itemprop="paidSt"
                            @else
                            itemprop="paidParents"
                            @endif
                            style="color: -webkit-link;"
                            target="_blank"
                            href="{{ asset('storage/'.$file->path_to_file) }}">
                            <span>{{ $file->name_file }}</span>
                        </a>
                    </li>

                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endforeach
@stop