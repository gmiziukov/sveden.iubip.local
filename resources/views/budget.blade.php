@extends('layouts.app')
@section('subsection-name')
Финансово-хозяйственная деятельность
@endsection
@section('content')

<div class="w-full h-full flex px-4 flex-col">

    @foreach($subsections as $subsection)
    <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
    @if($subsection->id == 52)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border font-medium border-gray-300">
                <th class="border border-gray-300" colspan="4">Объем образовательной деятельности, финансовое обеспечение которой осуществляется</th>
            </tr>
            <tr class="bg-slate-200 border font-medium border-gray-300">
                <th class="border border-gray-300">за счёт бюджетных ассигнований федерального бюджета (тыс. руб.)</th>
                <th class="border border-gray-300">за счёт бюджетов субъектов Российской Федерации (тыс. руб.)</th>
                <th class="border border-gray-300">за счёт местных бюджетов (тыс. руб.)</th>
                <th class="border border-gray-300">по договорам об оказании платных образовательных услуг (тыс. руб.)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
                <td class="border text-center">4</td>
            </tr>
            @foreach ($budgetValue as $value)
            <tr class="border text-justify">
                <td itemprop="finBFVolume" class="border border-gray-300 px-2 text-center place-items-center"> {{ $value->fin_bf_volume }} </td>
                <td itemprop="finBRVolume" class="border border-gray-300 px-2 text-center place-items-center"> {{ $value->fin_br_volume }} </td>
                <td itemprop="finBMVolume" class="border border-gray-300 px-2 text-center place-items-center"> {{ $value->fin_bm_volume }} </td>
                <td itemprop="finPVolume" class="border border-gray-300 px-2 text-center place-items-center"> {{ $value->fin_p_volume }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 53)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border border-gray-300">Год</th>
                <th class="border border-gray-300">Поступившие финансовые и материальные средства</th>
                <th class="border border-gray-300">Расходованные финансовые и материальные средств</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
            </tr>
            @foreach ($budgetValueYear as $valueyear)
            <tr itemprop="volume" class="border text-justify">
                <td itemprop="finYear" class="border px-2 text-center border-gray-300">{{ $valueyear->fin_year }} </td>
                <td itemprop="finPost" class="border px-2 text-center border-gray-300"> {{ $valueyear->fin_post }} </td>
                <td itemprop="finRas" class="border px-2 text-center border-gray-300"> {{ $valueyear->fin_ras }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endforeach
    @foreach($budgetPlan as $file)
    <li>
        <a href="{{ asset('storage/'.$file->path_to_file) }}" itemprop="finPlanDocLink" style="color: -webkit-link;" target="_blank">{{ $file->name_file }}</a>
    </li>
    @endforeach
</div>
@stop