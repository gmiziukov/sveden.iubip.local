@extends('layouts.app')

@section('content')
<div class="w-full h-full flex px-4 flex-col text-slate-700 ">

    <div class="px-2 py-2">
        <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
            <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Финансово-хозяйственная деятельность</p>
        </div>
    </div>

    @foreach($subsections as $subsection)
    <div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
    @if($subsection->id == 52)
    <table class="w-full border">
        <thead>
            <tr class="bg-blue-100 border font-medium border-blue-200">
                <th class="border border-blue-200" colspan="4">Объем образовательной деятельности, финансовое обеспечение которой осуществляется</th>
            </tr>
            <tr class="bg-blue-100 border font-medium border-blue-200">
                <th class="border border-blue-200">за счёт бюджетных ассигнований федерального бюджета (тыс. руб.)</th>
                <th class="border border-blue-200">за счёт бюджетов субъектов Российской Федерации (тыс. руб.)</th>
                <th class="border border-blue-200">за счёт местных бюджетов (тыс. руб.)</th>
                <th class="border border-blue-200">по договорам об оказании платных образовательных услуг (тыс. руб.)</th>
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
                <td itemprop="finBFVolume" class="border border-slate-300 px-2 text-center place-items-center"> {{ $value->fin_bf_volume }} </td>
                <td itemprop="finBRVolume" class="border border-slate-300 px-2 text-center place-items-center"> {{ $value->fin_br_volume }} </td>
                <td itemprop="finBMVolume" class="border border-slate-300 px-2 text-center place-items-center"> {{ $value->fin_bm_volume }} </td>
                <td itemprop="finPVolume" class="border border-slate-300 px-2 text-center place-items-center"> {{ $value->fin_p_volume }} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 53)
    <table class="w-full border">
        <thead>
            <tr class="border">
                <th class="bg-blue-100 border border-blue-200">Год</th>
                <th class="bg-blue-100 border border-blue-200">Поступившие финансовые и материальные средства</th>
                <th class="bg-blue-100 border border-blue-200">Расходованные финансовые и материальные средств</th>
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
                <td itemprop="finYear" class="border px-2 text-center border-slate-300">{{ $valueyear->fin_year }} </td>
                <td itemprop="finPost" class="border px-2 text-center border-slate-300"> {{ $valueyear->fin_post }} </td>
                <td itemprop="finRas" class="border px-2 text-center border-slate-300"> {{ $valueyear->fin_ras }} </td>
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