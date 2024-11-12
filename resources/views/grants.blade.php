@extends('layouts.app')

@section('content')
<div class="px-2 py-2">
    <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
        <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Стипендии и меры поддержки обучающихся</p>
    </div>
</div>
@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">

    @if($subsection->id == 46)
    @foreach($grantFile->where('subsections_id', 46) as $file)
    <li class="list-none" itemprop="localAct">
        <a itemprop="support" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 47)
    @foreach($grantFile->where('subsections_id', 47) as $file)
    <li class="list-none" itemprop="support">
        <a itemprop="support" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 48)
    <table class="w-full border">
        <thead>
            <tr class="bg-blue-100 border border-blue-200">
                <th class="border border-blue-200">Наименование показателя</th>
                <th class="border border-blue-200">Общежития</th>
                <th class="border border-blue-200">Интернаты</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
            </tr>
            @foreach($grantHostel as $hostel)
            <tr class="">
                <td class="border px-2">{{ $hostel->info }}</td>
                <td itemprop="hostelInfo" class="border text-center px-2">{{ $hostel->num }}</td>
                <td itemprop="interInfo" class="border text-center px-2">{{ $hostel->numtwo }}</td>
                <td itemprop="hostelNum"class="border text-center px-2">{{ $hostel->num_ovz }}</td>
                <td itemprop="interNum"></td>

                <td itemprop="hostelNumOvz"></td>
                <td itemprop="interNumOvz"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @foreach($grantFile->where('subsections_id', 48) as $file)
    <li class="list-none" itemprop="localAct">
        <a itemprop="localActObSt" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 49)
    @foreach($grantFile->where('subsections_id', 49) as $file)
    <li class="list-none" itemprop="localAct">
        <a onclick="return false;" style = " cursor: text;" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 50)
    @foreach($grantFile->where('subsections_id', 50) as $file)
    <li class="list-none" itemprop="localActObSt">
        <a style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif
</div>
@endforeach
@stop