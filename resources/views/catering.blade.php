@extends('layouts.app')
@section('subsection-name')
Организация питания в образовательной организации
@endsection
@section('content')

<div class="w-full h-full flex px-4 flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>
    <div class="w-full overflow-auto md:overflow-hidden">
        <table class="border">
            <thead style="position: sticky; top:0">
                <tr class="h-[1rem] bg-slate-200 md:text-base text-sm border border-gray-300">
                    <th class="border border-gray-300 md:font-semibold font-normal">Наименование объекта</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">Адрес места нахождения</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">Площадь, м</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">Количество мест</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border md:text-base text-sm">
                    <td class="border border-gray-300 text-center">1</td>
                    <td class="border border-gray-300 text-center">2</td>
                    <td class="border border-gray-300 text-center">3</td>
                    <td class="border border-gray-300 text-center">4</td>
                    <td class="border border-gray-300 text-center">5</td>
                </tr>
                @if($subsection->id == 57)
                @foreach ($cateringMeals as $meals)
                <tr itemprop="meals" class="md:text-base text-sm border">
                    <td itemprop="objName" class="border border-gray-300 px-2">{{ $meals->obj_name }} </td>
                    <td itemprop="objAddress" class="border border-gray-300 px-2">{{ $meals->obj_address }}</td>
                    <td itemprop="objSq" class="border border-gray-300 text-center">{{ $meals->obj_sq }} </td>
                    <td itemprop="objCnt" class="border border-gray-300 text-center">{{ $meals->obj_cnt }}</td>
                    <td itemprop="objOvz" class="border border-gray-300 px-2">{{ $meals->obj_ovz }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    @if($subsection->id == 63)
    @foreach ($cateringHealths as $health)
    <tr itemprop="health" class="border md:text-base text-sm">
        <td itemprop="objName" class="border px-2 place-items-center border-gray-300">{{ $health->obj_name }}</td>
        <td itemprop="objAddress" class="border px-2 place-items-center border-gray-300">{{ $health->obj_address }}</td>
        <td itemprop="objSq" class="border place-items-center border-gray-300 text-center">{{ $health->obj_sq }}</td>
        <td itemprop="objCnt" class="border place-items-center border-gray-300 text-center">{{ $health->obj_cnt }}</td>
        <td itemprop="objOvz" class="border px-2 place-items-center border-gray-300">{{ $health->obj_ovz }}</td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    @endforeach
</div>
@stop