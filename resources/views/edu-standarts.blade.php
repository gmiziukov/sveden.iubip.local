@extends('layouts.app')
@section('subsection-name')
Образовательные стандарты и требования
@endsection
@section('content')

@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">

    @if($subsection->id == 28)

    @php $groupedFiles = collect($eduStandartFile)->groupBy('name'); @endphp

    @foreach($groupedFiles as $name => $files)

    <h3>{{ $name }}</h3>
    <ul class="list-none">
        @foreach($files->whereIn('col', [1, 2, 3, 4, 5]) as $file)
        <li>
            <a itemprop="eduFedDoc" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
        </li>
        @endforeach
    </ul>
    @endforeach
    @endif

    @if($subsection->id == 29)
    @foreach($eduStandartFile->where('col', 6) as $file)
    <li class="list-none">
        <a itemprop="eduStandartDoc" onclick="return false;" style=" cursor: text;" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 30)
    @foreach($eduStandartFile->where('col', 7) as $file)
    <li class="list-none">
        <a itemprop="eduFedTreb" style="color: -webkit-link;" target="_self" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 31)
    @foreach($eduStandartFile->where('col', 8) as $file)
    <li class="list-none">
        <a itemprop="eduStandartTreb" onclick="return false;" style=" cursor: text;" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

</div>
@endforeach
@stop