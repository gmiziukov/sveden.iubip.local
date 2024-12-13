@extends('layouts.app')
@section('subsection-name')
Образовательные стандарты и требования
@endsection
@section('content')

<div class="w-full h-full px-4 flex flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>
    @php $groupedFiles = collect($eduStandartFile)->groupBy('name'); @endphp
    
    @if($subsection->id == 28)
    @foreach($groupedFiles as $name => $files)
    <h3 class="md:text-lg text-base">{{ $name }}</h3>
    <ul class="list-none">
        @foreach($files->whereIn('col', [1, 2, 3, 4, 5]) as $file)
        <li>
            <a itemprop="eduFedDoc" style="color: -webkit-link;" target="_self" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
        </li>
        @endforeach
    </ul>
    @endforeach
    @endif

    @if($subsection->id == 29)
    @foreach($eduStandartFile->where('col', 6) as $file)
    <li class="list-none">
        <a itemprop="eduStandartDoc" onclick="return false;" style=" cursor: text;" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 30)
    @foreach($eduStandartFile->where('col', 7) as $file)
    <li class="list-none">
        <a itemprop="eduFedTreb" style="color: -webkit-link;" target="_self" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 31)
    @foreach($eduStandartFile->where('col', 8) as $file)
    <li class="list-none">
        <a itemprop="eduStandartTreb" onclick="return false;" style=" cursor: text;" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @endforeach
</div>
@stop