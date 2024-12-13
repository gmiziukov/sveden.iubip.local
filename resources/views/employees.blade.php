@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
{{-- {{dd($data)}} --}}
<div id = "main">
    @if ($data)
        <form action=""> 
            <div id = "main_item" class =" flex flex-col">
                @foreach($data as $item)
                    {{-- 
                        ----output data----
                            0 = document
                            1 = text
                            2 = table 
                        ----output data----
                    --}}  
                    @if($item->type_supplement == 0)
                        {{$item->type_supplement}}
                    @endif
                    @if($item->type_supplement == 1)
                        {{$item->text}}
                    @endif
                    @if($item->type_supplement == 2)
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
                                                    {{$i}}
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach

                                </tr>
                            @endforeach
                        </table>
                    @endif
                @endforeach
            </div>
        </form>
                
    @else           
    @endif
    <script src="{{asset("redactor.js")}}"></script>
</div>
@stop