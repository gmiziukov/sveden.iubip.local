@extends('layouts.app')
{{-- @section('dop')
@vite(['public/redactor.js'])
@stop --}}
@section('content')
    {{-- {{dd($data)}} --}}
    <div class="text-lg" id = "main">
        <div class = "border-b-2 p-2" id=create_element>
            <select class="px-2 h-[35px]" id="type_create_element">
                <option value="text">Текст</option>
                <option value="DocOrHref">Документ или ссылка</option>
                <option value="table">Таблица</option>
            </select>
            <button class="text-lg h-[35px] border rounded-md px-2 bg-slate-200" id = "button_create"
                onclick="create_element()";>Создать</button>
        </div>
        уточнить как поступить с ссылками и документам в таблице
        *поиск делать колонку или обозначение по всей таблице с булевым параметром
        и потом искать то то орпеделённое и менять
        @if ($data)
            <form action="">
                <div id = "main_item" class ="p-2 flex flex-col">
                    <div class="border bg-slate-200 font-medium w-[35.6%] flex flex-row px-2">
                        <p class="w-[13.2rem] border-gray-300 border-r-2">Название страницы</p>
                        <p class="w-[13.88rem] px-2 border-gray-300 border-r-2">Ссылка</p>
                        <p class="w-[13rem] px-2">Действия</p>
                    </div>
                    @foreach ($data as $data1)
                        <div class="border w-[35.6%] px-2" id = "item">
                            <input type="hidden" value={{ $data1->id }}>
                            <input type="hidden" id = "pos" value={{ $data1->position }}>
                            <input type="text" value={{ $data1->name }}>
                            <input class="px-2 border-x-2" type="text" value={{ $data1->href }}>
                            <a href="{{ route('redactor', ['', 'data' => $data1->href]) }}">Переход на страницу</a>
                            <button class="px-2 border-x-2" onclick="position_up({{ $data1->id }});"
                                type="button">Выше</button>
                            <button class="px-2" onclick="position_down({{ $data1->id }});"
                                type="button">Ниже</button>
                        </div>
                    @endforeach
                </div>
            </form>
        @else
        @endif
        <script src="{{ asset('redactor.js') }}"></script>
    </div>
@stop
