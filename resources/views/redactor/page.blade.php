@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
{{-- {{dd($data)}} --}}
<?php
error_reporting(E_ALL);
ini_set("display_errors",true);
?>
<div id = "main">
    <div class = "border-2" id = create_element>
        <select id="type_create_element">
            <option value="text">text</option>
            <option value="DocOrHref">DocOrHref</option>  
            <option value="table">table</option>
        </select>
        <button id = "button_create" onclick="create_element()";>select</button>
    </div>
    @if ($data)
        {{-- <form action="update_pos ">  --}}
            <div id = "main_item" class =" flex flex-col">
                @foreach($data as $item)
                {{-- {{dd($item)}} --}}
                    {{-- 
                        ----output data----
                            1 = text
                            2 = document/href
                            3 = table 
                        ----output data----
                    --}}  
                    @if($item->type_supplement == 1)
                    <div id = "item">
                        <input type="hidden" value={{$item->id}} name="id[]">
                        <input type="hidden" value={{$item->position}} name="pos[]">
                        <form action="/sort">
                            <input type="hidden" value={{$page_name}} name="page_name">
                            <input type="hidden" value={{$item->id}} name="id">
                            <input type="hidden" value="1" name="input_type">
                            <input type="text" value= {{$item->text}} name = "text">
                            <input type="text" value= {{$item->teg}} name = "teg">
                            <button type="submit" value="1" name="but">save</button>
                            <button type="submit" value="2" name="but">delete</button>
                        </form>
                        <button onclick="position_up({{$item->id}});" type="button">выше</button>
                        <button onclick="position_down({{$item->id}});" type="button">ниже</button>
                    </div>
                    @endif
                    @if($item->type_supplement == 2)
                        <div id = "item">
                        <input type="hidden" value="1" name="input_type">
                        <input type="hidden" value={{$page_name}} name="page_name">
        
                        {{-- <input type="hidden" value="1" name="input_type"> --}}

                            {{$item->type_supplement}}
                        </div>
                    @endif
                    @if($item->type_supplement == 3)
                    <form action="" method="post"></form>
                    <div id = "item" class = "border-2">
                        <input type="hidden" value={{$item->id}} name="id[]">
                        <input type="hidden" value={{$item->position}} name="pos[]">

                    <form action="/sort" id = {{$item->id}}>
                        <input type="hidden" name = "table_name" value={{$item->text}}>
                        <input type="hidden" value="3" name="input_type">
                        <input type="hidden" value={{$page_name}} name="page_name">

                        <table>
                            @foreach ($data_table[$item->supplement] as $table)
                            {{-- {{dd($table)}} --}}
                                <tr itemprop={{$item->teg}} >
                                    @foreach ($table as $i) 
                                        @if ($loop->first)
                                        <td>
                                        </td>
                                        @else
                                            @php next($table); @endphp
                                            @if(key($table) == "created_at" or key($table) == "updated_at")
                                            @else
                                                <td itemprop={{key($table)}}>
                                                    <input type="text" name ="{{key($table)}}[]"  value={{$i}}>

                                                    {{-- {{$i}} --}}
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                </tr>
                                
                            @endforeach
                        </table>
                        <button type="submit" value="2" name="but">delete</button>
                        <button type="submit" value="1" name="but">save</button>
                    </form>
                    <button onclick="position_up({{$item->id}});" type="button">выше</button>
                    <button onclick="position_down({{$item->id}});" type="button">ниже</button>
                    </div>
                    @endif
                @endforeach
            </div>
        {{-- </form> --}}
                
    @else           
    @endif
    <script src="{{asset("redactor.js")}}"></script>
</div>
@stop