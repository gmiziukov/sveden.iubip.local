@extends('layouts.app')
@section('subsection-name')
Платные образовательные услуги
@endsection
@section('content')

<div class="px-4 w-full h-full flex flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>

    @if($subsection->id == 51)
    @php $groupedFiles = collect($paidEduFile)->groupBy('name'); @endphp
    <table class="md:text-base text-sm mb-4 text-left">
        <tbody>
            @foreach ($groupedFiles as $name => $files)
            <tr class="h-[3rem] text-justify">
                <td class="border border-gray-300 md:w-[50rem] w-[10rem] px-2" itemprop="name">{{ $name }}</td>
                <td class="border border-gray-300 px-2">
                    @foreach ($files as $file)
                    <li style="margin-left:-5px;" class="md:list-none">
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