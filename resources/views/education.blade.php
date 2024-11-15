@extends('layouts.app')

@section('content')
<div>

    {{-- {{dd($data_table)}} --}}
    @foreach ($data as $item)
    @if ($item->type_supplement == 1)
        <div itemprop={{$item->teg}}>{{$item->text}}</div>
    @endif
    @if($item->type_supplement == 2)
        {{-- @for ($i = 1; $i < count($data_table[$item->type_supplement])+1; $i++) --}}
            @foreach ($data_table[$item->type_supplement] as $item_table)
                {{$item_table->id}}
            @endforeach
            
        {{-- @endfor --}}
    @endif
    @endforeach
</div>
@stop