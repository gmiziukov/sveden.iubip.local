@extends('layouts.app')
@section('subsection-name')
Организация питания в образовательной организации
@endsection
@section('content')
<div class="w-full h-full flex flex-col">

    @foreach($subsections as $subsection)
    <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
    <div class="px-6 flex flex-col justify-center items-center">
        <table class="w-full border">
            <thead>
                <tr class="h-[1rem] bg-slate-200 border border-gray-300">
                    <th class="w-[15rem] font-medium border-gray-300">Наименование объекта</th>
                    <th class="border w-[25rem] font-medium border-gray-300">Адрес места нахождения</th>
                    <th class="border w-[6rem] font-medium border-gray-300">Площадь, м</th>
                    <th class="border w-[6rem] font-medium border-gray-300">Количество мест</th>
                    <th class="border w-[70rem] font-medium border-gray-300">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</th>
                </tr>
            </thead>
            <tbody class="text-slate-600">
                <tr class="border">
                    <td class="border border-gray-300 text-center text-sm">1</td>
                    <td class="border border-gray-300 text-center text-sm">2</td>
                    <td class="border border-gray-300 text-center text-sm">3</td>
                    <td class="border border-gray-300 text-center text-sm">4</td>
                    <td class="border border-gray-300 text-center text-sm">5</td>
                </tr>

                @if($subsection->id == 57)
                @foreach ($cateringMeals as $meals)
                <tr itemprop="meals" class="border">
                    <td itemprop="objName" class="border border-gray-300 px-2 place-items-center">{{ $meals->obj_name }} </td>
                    <td itemprop="objAddress" class="border border-gray-300 px-2">{{ $meals->obj_address }}</td>
                    <td itemprop="objSq" class="border border-gray-300 px-2 text-center">{{ $meals->obj_sq }} </td>
                    <td itemprop="objCnt" class="border border-gray-300 px-2 text-center">{{ $meals->obj_cnt }}</td>
                    <td itemprop="objOvz" class="border border-gray-300 px-2">{{ $meals->obj_ovz }}</td>
                </tr>


                @endforeach
                @endif
                @if($subsection->id == 63)
                @foreach ($cateringHealths as $health)
                <tr itemprop="health" class="border">
                    <td itemprop="objName" class="border px-2 place-items-center border-gray-300">{{ $health->obj_name }}</td>
                    <td itemprop="objAddress" class="border px-2 place-items-center border-gray-300">{{ $health->obj_address }}</td>
                    <td itemprop="objSq" class="border px-2 place-items-center border-gray-300">{{ $health->obj_sq }}</td>
                    <td itemprop="objCnt" class="border px-2 place-items-center border-gray-300">{{ $health->obj_cnt }}</td>
                    <td itemprop="objOvz" class="border px-2 place-items-center border-gray-300">{{ $health->obj_ovz }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@stop