@extends('layouts.app')

@section('content')
<h4>Информация об объеме образовательной деятельности</h4>
<table class="w-full border">
    <thead>
        <tr class="border">
            <th colspan="4" class="border">Объем образовательной деятельности, финансовое обеспечение которой осуществляется</th>
        </tr>
        <tr class="border">
            <th class="border">за счёт бюджетных ассигнований федерального бюджета (тыс. руб.)</th>
            <th class="border">за счёт бюджетов субъектов Российской Федерации (тыс. руб.)</th>
            <th class="border">за счёт местных бюджетов (тыс. руб.)</th>
            <th class="border">по договорам об оказании платных образовательных услуг (тыс. руб.)</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border">
            <td class="border text-center">1</td>
            <td class="border text-center">2</td>
            <td class="border text-center">3</td>
            <td class="border text-center">4</td>

        </tr>
        <tr class="border">
            <td itemprop="finBFVolume" class="border"> тыс. руб.</td>
            <td itemprop="finBRVolume" class="border"> тыс. руб.</td>
            <td itemprop="finBMVolume" class="border"> тыс. руб.</td>
            <td itemprop="finPVolume" class="border"> тыс. руб.</td>
        </tr>
    </tbody>
</table>
<h4>Информация о поступлении и расходовании финансовых и материальных средств</h4>
<table class="w-full border">
    <thead>
        <tr class="border">
            <th class="border">Год</th>
            <th class="border">Поступившие финансовые и материальные средства</th>
            <th class="border">Расходованные финансовые и материальные средств</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border">
            <td class="border text-center">1</td>
            <td class="border text-center">2</td>
            <td class="border text-center">3</td>
        </tr>
        <tr itemprop="volume" class="border">
            <td itemprop="finYear" class="border">2020</td>
            <td itemprop="finPost" class="border"> финансовые и материальные средства </td>
            <td itemprop="finRas" class="border"> финансовые и материальные средства </td>
        </tr>
        <tr itemprop="volume" class="border">
            <td itemprop="finYear" class="border">2021</td>
            <td itemprop="finPost" class="border"> финансовые и материальные средства </td>
            <td itemprop="finRas" class="border"> финансовые и материальные средства </td>
        </tr>
    </tbody>
</table>
<h4>Копия плана финансово-хозяйственной деятельности образовательной организации, утвержденного в установленном законодательством Российской Федерации порядке, или бюджетной сметы образовательной организации</h4>
<a href="ссылка на документ" itemprop="finPlanDocLink">План финансово-хозяйственной деятельности образовательной организации или бюджетная смета образовательной организации</a>
@stop