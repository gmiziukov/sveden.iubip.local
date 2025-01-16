@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
<?php
?>
<div id = "main">
    @if ($data)
    {{-- {{dd($data)}} --}}
        {{-- {{dd($data_table)}} --}}
        {{-- <form action="update_pos ">  --}}
            <div id = "main_item" class =" flex flex-col ">
                @foreach($data as $item)
                    @if (isset($item->type_supplement))
                        @if($item->type_supplement == 1)
                        <div id = "item" class = "border-2 flex place-content-center">
                            <div>
                                {{$item->text}}
                            </div>
                        </div>
                        @endif
                        @if($item->type_supplement == 2)
                            {{-- {{dd($item)}} --}}
                            <a href={{$item->path}}>{{$item->name}}</a>
                            <div id = "item" class = "border-2 flex place-content-center">  
                            </div>
                        @endif
                        @if($item->type_supplement == 3)
                        <div id = "item" class = "border-2 place-content-center">
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
                                                        <div>
                                                            {{$i}}
                                                        </div>
                                                        {{-- {{$i}} --}}
                                                    </td>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                    
                                @endforeach
                            </table>
                        </div>
                        @endif
                    @else
                        {{-- {{dd($item)}} --}}
                        <div class="border w-[35.6%] px-2" id = "item">
                            <a href="{{ route('sveden', ['data' => $item->href]) }}">{{$item->name}}</a>
                        </div>
                    @endif
                    {{-- {{dd($item)}} --}}
                    {{-- 
                        ----output data----
                            1 = text
                            2 = document/href
                            3 = table 
                        ----output data----
                    --}}  

                @endforeach
            </div>
        {{-- </form> --}}
                
    @else           
    @endif
</div>
@stop