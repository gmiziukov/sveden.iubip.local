@extends('layouts.app')

@section('content')
<div>
    {{-- {{dd($data)}} --}}
    @foreach ($data as $item)
    @if ($item->type_supplement == 1)
        <div itemprop={{$item->teg}}>{{$item->text}}</div>
    @endif
    @if($item->type_supplement == 2)
        d
    @endif
    @endforeach
</div>
@stop