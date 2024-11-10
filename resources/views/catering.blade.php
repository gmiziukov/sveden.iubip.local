@extends('layouts.app')

@section('content')
<table class="w-full border">
    <thead>
        <tr class="border">
            <th class="border">Наименование объекта</th>
            <th class="border">Адрес места нахождения</th>
            <th class="border">Площадь, м</th>
            <th class="border">Количество мест</th>
            <th class="border">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border">
            <td class="border text-center">1</td>
            <td class="border text-center">2</td>
            <td class="border text-center">3</td>
            <td class="border text-center">4</td>
            <td class="border text-center">5</td>
        </tr>
        <tr itemprop="meals" class="border">
            <td itemprop="objName" class="border">Наименование объекта </td>
            <td itemprop="objAddress" class="border">Адрес места нахождения</td>
            <td itemprop="objSq" class="border">Площадь </td>
            <td itemprop="objCnt" class="border">Количесто мест</td>
            <td itemprop="objOvz" class="border">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья </td>
        </tr>
        <tr itemprop="health" class="border">
            <td itemprop="objName" class="border">Наименование объекта </td>
            <td itemprop="objAddress" class="border">Адрес места нахождения</td>
            <td itemprop="objSq" class="border">Площадь </td>
            <td itemprop="objCnt" class="border">Количесто мест</td>
            <td itemprop="objOvz" class="border">Приспособленность для использования инвалидами и лицами с ограниченными возможностями здоровья </td>
        </tr>
    </tbody>
</table>
@stop