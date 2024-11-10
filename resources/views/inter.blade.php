@extends('layouts.app')

@section('content')
<table class="w-full border">
    <thead>
        <tr class="border">
            <th class="border">№ п/п</th>
            <th class="border">Государство</th>
            <th class="border">Наименование организации</th>
            <th class="border">Реквизиты договора (наименование, дата, номер, срок действия)</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border">
            <td class="border text-center">1</td>
            <td class="border text-center">2</td>
            <td class="border text-center">3</td>
            <td class="border text-center">4</td>
        </tr>
        <tr itemprop="internationalDog" class="border">
            <td class="border">1</td>
            <td itemprop="stateName" class="border"> Название государства </td>
            <td itemprop="orgName" class="border"> Наименование организации </td>
            <td itemprop="dogReg" class="border"> Реквизиты договора (наименование, дата, номер, срок действия) </td>
        </tr>
    </tbody>
</table>
@stop