@extends('layouts.app')
@section('subsection-name')
Стипендии и меры поддержки обучающихся
@endsection
@section('content')

@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">

    @if($subsection->id == 46)
    @foreach($grantFile->where('subsections_id', 46) as $file)
    <li class="list-none">
        <a itemprop="grant" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 47)
    @foreach($grantFile->where('subsections_id', 47) as $file)
    <li class="list-none">
        <a itemprop="support" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 48)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border border-gray-300">Наименование показателя</th>
                <th class="border border-gray-300">Общежития</th>
                <th class="border border-gray-300">Интернаты</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
            </tr>
            @foreach($grantHostel as $value)
            <tr class="">
                <td class="border">{{$value->name_kolvo}}</td>
                <td itemprop="hostelInfo" class="border text-center px-2">{{ $value->kolvo_hostel }}</td>
                <td itemprop="interInfo" class="border text-center px-2">{{ $value->kolvo_inter }}</td>
            </tr>
            <tr class="">
                <td class="border">{{$value->name_num}}</td>
                <td itemprop="hostelNum" class="border text-center px-2">{{ $value->num_hostel }}</td>
                <td itemprop="interNum" class="border text-center px-2">{{ $value->num_inter }}</td>
            </tr>
            <tr class="">
                <td class="border">{{$value->name_numtwo}}</td>
                <td class="border text-center px-2">{{ $value->numtwo_hostel }}</td>
                <td class="border text-center px-2">{{ $value->numtwo_inter }}</td>
            </tr>
            <tr class="">
                <td class="border">{{$value->name_num_ovz}}</td>
                <td itemprop="hostelNumOvz" class="border text-center px-2">{{ $value->num_ovz_hostel }}</td>
                <td itemprop="interNumOvz" class="border text-center px-2">{{ $value->num_ovz_inter }}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
    @foreach($grantFile->where('subsections_id', 48) as $file)
    <li class="list-none">
        <a itemprop="hostelNumOvz" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 49)
    @foreach($grantFile->where('subsections_id', 49) as $file)
    <li class="list-none">
        <a itemprop="localAct" onclick="return false;" style=" cursor: text;" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 50)
    @foreach($grantFile->where('subsections_id', 50) as $file)
    <li class="list-none">
        <a itemprop="localActObSt" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif
</div>
@endforeach
@stop