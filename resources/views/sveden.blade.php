@extends('layouts.app')

@section('content')
@if ($data)
@foreach ($data as $data1)
    <div>
        <a href="{{$data1->href}}"> {{$data1->name}}</a>
    </div>
@endforeach
@else
@endif
@stop