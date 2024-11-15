@extends('layouts.app')

@section('content')
    {{-- {{dd($data_table)}} --}}
    @foreach ($data as $data1)
        @if ($data1->type_supplement == 1)
            <h1 itemprop={{$data1->teg}}>
                {{$data1->text}}
            </h1>
        @endif
        @if ($data1->type_supplement == 2)
                @foreach ($data_table[$data1->supplement] as $table)
                    <table>
                        <tr itemprop={{$data1->teg}}>
                            <td itemprop="fio">
                               {{$table->fio}} 
                            </td>
                            <td itemprop="post">
                                {{$table->post}} 
                            </td>
                            <td itemprop="teachingDiscipline">
                                {{$table->teachingDiscipline}} 
                            </td>
                            <td itemprop="teachingLevel">
                                {{$table->teachingLevel}} 
                            </td>
                            <td itemprop="degree">
                                {{$table->degree}} 
                             </td>
                             <td itemprop="academStat">
                                 {{$table->academStat}} 
                             </td>
                             <td itemprop="qualification">
                                 {{$table->qualification}} 
                             </td>
                             <td itemprop="profDevelopment">
                                 {{$table->profDevelopment}} 
                             </td>
                             <td itemprop="specExperience">
                                {{$table->specExperience}} 
                            </td>
                            <td itemprop="teachingOp">
                                {{$table->teachingOp}} 
                            </td>
                        </tr>
                    </table>
                @endforeach

        @endif
    @endforeach
@stop