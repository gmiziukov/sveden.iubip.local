@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
{{-- {{dd($data)}} --}}
<div id = "main">
    <div class = "border-2" id = create_element>
        <select id="type_create_element">
            <option value="text">text</option>
            <option value="DocOrHref">DocOrHref</option>  
            <option value="table">table</option>
        </select>
        <button id = "button_create" onclick="create_element()";>select</button>
    </div>
    уточнить как поступить с ссылками и документам в таблице
    *поиск делать колонку или обозначение по всей таблице с булевым параметром
    и потом искать то то орпеделённое и менять  
    @if ($data)
        <form action=""> 
            <div id = "main_item" class =" flex flex-col">
                @foreach ($data as $data1)
                    <div id = "item">
                        <input type="hidden" value={{$data1->id}}>
                        <input type="hidden" id = "pos" value={{$data1->position}}>
                        <input type="text" value={{$data1->name}}>
                        <input type="text" value={{$data1->href}}>
                        <a href="{{route('redactor',['','data'=>$data1->href])}}">cont</a>
                        <button onclick="position_up({{$data1->id}});" type="button">выше</button>
                        <button onclick="position_down({{$data1->id}});" type="button">ниже</button>
                    </div>
                @endforeach
            </div>
        </form>
                
    @else           
    @endif
    <script src="{{asset("redactor.js")}}"></script>
</div>
@stop