@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
<?php
error_reporting(E_ALL);
ini_set("display_errors",true);
?>


<div id = "main">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class = "border-2" id = create_element>
        <select id="type_create_element">
            <option value="text">text</option>
            <option value="DocOrHref">DocOrHref</option>  
            <option value="table">table</option>
        </select>
        <button id = "button_create" onclick="create_element()";>select</button>
    </div>
    <script>
        var table_lenght=1;
    </script>
    @if ($data)
    {{-- {{dd($data)}} --}}
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
                        <form action="/sort" method="post">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            <input type="hidden" value={{$item->id}} name="id[]">
                            <input type="hidden" value={{$item->position}} name="pos[]">
                            <input type="hidden" value="1" name="input_type">
                            <input type="hidden" value={{$page_name}} name="page_name">
            
                            {{-- <input type="hidden" value="1" name="input_type"> --}}

                            <input type="text" name = "path" value ={{$item->name}}>
                            <input type="text" name = "path" value ={{$item->path}}>
                                {{-- {{dd($item)}} --}}
                        </div>
                    @endif
                    @if($item->type_supplement == 3)
                    {{-- {{dd($item)}} --}}
                    <form action="" method="post"></form>
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id = "item" class = "border-2" name="table">
                        <input type="hidden" value={{$item->id}} name="id[]">
                        <input type="hidden" value={{$item->position}} name="pos[]">

                    <form action="/sort" method = "post" id = {{$item->id}}>
                        @csrf
                        @if($item->hidden == 1)
                            <input type="checkbox" name="hidden" checked value = 1> 
                        @else
                            <input type="checkbox" name="hidden" value = 1> 
                        @endif
                        <input type="hidden" name = "table_name" value={{$item->name}}>
                        <input type="hidden" value="3" name="input_type">
                        <input type="hidden" value={{$page_name}} name="page_name">
                        <input type="hidden" name = "main_id" value={{$item->id}}>


                        <table>

                            <script>
                                table_lenght=table_lenght+1;
                                // var table{{$item->supplement}} = {};
                                // console.log(table_leght);
                                // table{{$item->supplement}}["car"] = "audi";
                            </script>
                                {{-- {{dd(gettype($data_table[$item->supplement][0]))}} --}}
                            {{-- {{dd(array_keys((array)$data_table[$item->supplement][0]))}} --}}
                            @foreach ($data_table[$item->supplement] as $table)
                                @foreach ( array_keys((array)$table) as $json)
                                    @if ($json=="js")
                                        @foreach ((array)$table->$json as $js)
                                            {{dd($js)}}
                                        @endforeach
                                        {{-- {{dd($table->js)}} --}}
                                    @else
                                        {{-- {{next($i)}} --}}
                                    @endif
                                @endforeach
                            {{-- {{dd($data_table)}} --}}
                            {{-- {{dd($data_table)}} --}}
                                <tr itemprop={{$item->teg}}>
                                    @foreach ($table as $i) 
                                        @if ($loop->first)
                                        <input type="hidden" name = "id[]" value = {{$table->id}}>
                                        <td>
                                        </td>
                                        @else
                                            @php next($table); @endphp
                                            @if(key($table) == "created_at" or key($table) == "updated_at")
                                            {{-- @elseif(key($table) == "js")
                                                {{dd($table)}} --}}
                                            @else
                                                <td itemprop={{key($table)}}>
                                                    <select name="table{{$item->supplement}}" id="type_data">
                                                        <option value="1">text</option>
                                                        <option value="2">image</option>
                                                        <option value="3">DocOrHref</option>
                                                    </select>
                                                    <input type="text" name ="{{key($table)}}[]"  value="{{$i}}">

                                                    {{-- {{$i}} --}}
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td>
                                        <button type="submit" value={{$table->id}} name="id">delete_table</button>
                                    </td>
                                    {{-- <button type="submit" value={{$table->id}} name="id"></button> --}}
                                </tr>
                                
                            @endforeach
                        </table>
                        <button type="submit" value="2" name="but">delete</button>
                        <button type="submit" value="1" name="but">save</button>
                    </form>
                    <button onclick="proba();" type="button">save_dd</button>
                    <button onclick="add_row({{$item->id}});" type="button">добавить строку</button>
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