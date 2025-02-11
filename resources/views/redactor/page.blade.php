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
    @if ($json_data != null)
        <input type="hidden" value={{$json_data}} id = "json_data">
    @endif
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


                        
                        
                                <script>
                                    table_lenght=table_lenght+1;
                                    // var table{{$item->supplement}} = {};
                                    // console.log(table_leght);
                                    // table{{$item->supplement}}["car"] = "audi";
                                </script>
                        @foreach ($data_table[$item->supplement] as $table)
                            {{-- @dd($data_table) --}}
                        <table>
                        {{-- @dd($table) --}}

                            <tr>
                                <input type="hidden" name = "id[]" value = {{$table->id}}>

                                @foreach($table as $row)
                                    
                                {{-- @dd($row) --}}
                                    @if ($loop->first)
                                        {{-- @foreach($row as $i)            --}}
                                            @if(key($table) == "id"  or key($table) == 'js' or key($table) == 'created_at' or key($table) == 'updated_at' or is_array($row))
                                            {{-- {{$i}} --}}
                                            @else
                                                <td>
                                                    {{$row}}
                                                    {{-- {{var_dump($i , key($row))}} --}}
                                                </td>
                                            @endif
                                            @php
                                                next($table)    
                                            @endphp
                                        {{-- @endforeach --}}
                                    @else
                                            {{-- {{dd($row)}} --}}
                                            @if (isset($table->js))
                                                @foreach ($table->js as $js)
                                                    {{-- @foreach($row as $i) --}}
                                                        {{-- {{dd($table)}} --}}
                                                        @if (key($table) == $js[0] )
                                                        {{-- {{dd($row)}} --}}
                                                            @if($js[1] == 1)
                                                                <td>
                                                                    <select name="table{{$item->supplement}}" id="type_data">
                                                                        <option value="1">text</option>
                                                                        <option value="2">image</option>
                                                                        <option value="3">DocOrHref</option>
                                                                    </select>
                                                                    <input type="file" value={{$row}} name = "{{key($table)}}[]">
    
                                                                </td>
                                                            @endif
                                                            @if($js[1] == 2)
                                                            {{-- @dd($row->js) --}}
                                                            {{-- {{var_dump($js, key($row))}} --}}
                                                                <td>
                                                                    <select name="table{{$item->supplement}}" id="type_data">
                                                                        <option value="1">text</option>
                                                                        <option value="2">image</option>
                                                                        <option value="3">DocOrHref</option>
                                                                    </select>
                                                                    <input type="file" value={{$row}} name = "{{key($table)}}[]">
                                                                </td>
                                                            @endif
                                                            @if($js[1] == 3)
                                                            {{-- @dd($row->js) --}}
    
                                                                <td>
                                                                    <select name="table{{$item->supplement}}" id="type_data">
                                                                        <option value="1">text</option>
                                                                        <option value="2">image</option>
                                                                        <option value="3">DocOrHref</option>
                                                                    </select>
                                                                    <input type="file" value={{$row}} name = "{{key($table)}}[]">
                                                                </td>
                                                            @endif
                                                        @elseif(key($table) == "id"  or key($table) == 'js' or key($table) == 'created_at' or key($table) == 'updated_at' or is_array($row))
                                                        @else
                                                            <td>
                                                                <select name="table{{$item->supplement}}" id="type_data">
                                                                    <option value="1">text</option>
                                                                    <option value="2">image</option>
                                                                    <option value="3">DocOrHref</option>
                                                                </select>
                                                                <input type="text" value="{{$row}}" name = "{{key($table)}}[]">
                                                                {{-- {{var_dump($i , key($row))}} --}}
                                                            </td>
                                                        @endif
    
    
                                                        {{-- {{dd(key($row))}} --}}
                                                        @php
                                                            next($table)    
                                                        @endphp
                                                    {{-- @endforeach --}}
                                                    {{-- {{dd($js[0])}} --}}
                                                @endforeach
                                            @else
                                                {{-- @foreach($row as $i)            --}}
                                                    @if(key($table) == "id"  or key($table) == 'js' or key($table) == 'created_at' or key($table) == 'updated_at' or is_array($row))
                                                    {{-- {{$i}} --}}
                                                    @else
                                                        <td itemprop="{{key($table)}}">
                                                            <select name="table{{$item->supplement}}" id="type_data">
                                                                <option value="1">text</option>
                                                                <option value="2">image</option>
                                                                <option value="3">DocOrHref</option>
                                                            </select>
                                                            <input type="text" value="{{$row}}" name = "{{key($table)}}[]">
                                                            {{-- {{var_dump($i , key($row))}} --}}
                                                        </td>
                                                    @endif
                                                    @php
                                                        next($table)    
                                                    @endphp
                                                {{-- @endforeach --}}
                                            @endif
    
                                        
                                    @endif
                                    
                                    @endforeach
    
                                </table>
                            @endforeach
                            </tr>
                                    {{-- {{dd(gettype($data_table[$item->supplement][0]))}} --}}
                                {{-- {{dd(array_keys((array)$data_table[$item->supplement][0]))}} --}}
                                {{-- {{dd($table)}} --}}


                            {{-- @foreach ($data_table as $table)
                                @foreach ($table as $row)
                                    @foreach(array_keys((array)$row) as $isjs)
                                        @if($isjs == "js")
                                            @foreach($row->js as $js)

                                                {{dd($js)}}
                                            @endforeach
                                            
                                        @endif
                                        @php next($row) @endphp
                                    @endforeach
                                    {{dd($row)}}
                                @endforeach
                            @endforeach
                            <tr>
                                <td>

                                </td>
                            </tr> --}}



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