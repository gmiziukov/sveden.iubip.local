@extends('layouts.app')
@section('subsection-name')
Документы
@endsection
@section('content')

@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">
    @if($subsection->id == 15)
    @php $groupedFiles = collect($document)->groupBy('name'); @endphp
    <table class="text-sm mb-4 text-left">
        <tbody>
            @foreach ($groupedFiles as $name => $docs)
            <tr class="h-[3rem] text-justify">
                <td class="border border-gray-300 w-[50rem] px-2 place-items-center" itemprop="name">{{ $name }}</td>
                <td class="border border-gray-300 px-2">
                    @foreach ($docs as $doc)
                    <li class="list-none">
                        <a
                            @if ($name=='Устав образовательной организации' )
                            itemprop="ustavDocLink"
                            @elseif ($name=='Правила внутреннего распорядка обучающихся' )
                            itemprop="localActStud"
                            @elseif ($name=='Правила внутреннего трудового распорядка' )
                            itemprop="localActOrder"
                            @elseif ($name=='Коллективный договор (при наличии)' )
                            itemprop="localActCollec"
                            @elseif ($name=='Отчеты о результатах самообследования' )
                            itemprop="reportEduDocLink"
                            @elseif ($name=='Предписания органов, осуществляющих государственный контроль (надзор) в сфере образования, копии отчетов об исполнении таких предписаний (при наличии)' )
                            itemprop="prescriptionDocLink"
                            @elseif ($name=='Локальные нормативные акты образовательной организации по основным вопросам организации и осуществления образовательной деятельности, в том числе регламентирующие: - правила приема обучающихся' )
                            itemprop="priemDocLink"
                            @elseif ($name=='- режим занятий обучающихся' )
                            itemprop="modeDocLink"
                            @elseif ($name=='- формы, периодичность и порядок текущего контроля успеваемости и промежуточной аттестации обучающихся' )
                            itemprop="tekKontrolDocLink"
                            @elseif ($name=='- порядок и основания перевода, отчисления и восстановления обучающихся' )
                            itemprop="perevodDocLink"
                            @elseif ($name=='- порядок оформления возникновения, приостановления и прекращения отношений между образовательной организацией и обучающимися и (или) родителями (законными представителями) несовершеннолетних обучающихся' )
                            itemprop="vozDocLink"
                            @else
                            itemprop="localAct"
                            @endif
                            style="color: -webkit-link;"
                            target="_blank"
                            href="{{ asset('storage/'.$doc->path_to_file) }}">
                            <span>{{ $doc->name_file }}</span>
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