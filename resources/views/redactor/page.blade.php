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
    @if ($json_data != "null")
        {{-- @dd($json_data) --}}
        <input type="hidden" value='{{$json_data}}' id = "json_data">
    @endif
    {{-- @dd($json_data) --}}
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
                            {{-- @dd($data) --}}
                            <table>
                            @foreach($data_table[$item->supplement] as $row)

                                <tr>
                                    

                                        @if (isset($data_table[$item->supplement]["js"]) )
                                            {{-- @dd($data_table[$item->supplement]) --}}
    
                                            @foreach ($row as $key => $items)
                                                {{-- @dd($row) --}}
                                                {{-- {{ var_dump($key) }}
                                                {{ var_dump($row[$key]) }} --}}
                                                {{-- @dd($data_table[$item->supplement]["js"]) --}}
                                                @if ($key != "js" and  $key != "id" and !is_array($row) and  isset($data_table[$item->supplement]["js"][$loop->parent->index]) and isset($data_table[$item->supplement]["js"][$loop->parent->index][$key]) )

                                                    <td itemprop = {{$key}}>
                                                        {{-- @dd($items) --}}
                                                        {{$items}} 1
                                                    </td>
                                                @else
                                                @if ($key != "js" and  $key != "id" and !is_array($row))
                                                    <td itemprop = {{$key}}>
                                                        {{-- @dd($items) --}}
                                                        {{$items}} 
                                                    </td>
                                                @endif

                                                @endif
                                            @endforeach
                                        @else 
                                            @foreach ($row as $items)
                                            {{-- @dd($items) --}}
                                                <td>
                                                    {{$items}} 2 
                                                </td>
                                            @endforeach
                                        @endif
                                        
                                </tr>












                                {{-- <table>
                                    @foreach($table as $key => $row)
 
                                        <tr>
                                            @if ($key == "js")

                                                @continue
                                            @else

                                                @if (isset($table->js))

                                                    @foreach ($row as $items)
                                                        <td>
                                                            {{$items}} 
                                                        </td>
                                                    @endforeach
                                                @else
                                                    @foreach ($row as $items)
                                                        @dd($items)
                                                        <td>
                                                            {{$items}} 
                                                        </td>
                                                    @endforeach             
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                </table> --}}













                            @endforeach
                            </table>
                            {{-- </tr> --}}
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

                    {{-- <button onclick="proba();" type="button">save_dd</button>
                    <button onclick="add_row({{$item->id}});" type="button">добавить строку</button>
                    <button onclick="position_up({{$item->id}});" type="button">выше</button>
                    <button onclick="position_down({{$item->id}});" type="button">ниже</button> --}}
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