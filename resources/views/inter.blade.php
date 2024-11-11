@extends('layouts.app')

@section('content')
<div class="px-2 py-2">
    <div class="flex flex-row text-md items-center h-[2.5rem] bg-slate-200">
        <p class="px-2">Главная</p>/<p class="px-2">Сведения об образовательной организации</p>/<p class="px-2">Международное сотрудничество</p>
    </div>
</div>
@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">
    @if($subsection->id == 56)
    <table class="w-full border">
        <thead>
            <tr class="bg-blue-100 border border-blue-200">
                <th class="border border-blue-200">№ п/п</th>
                <th class="border border-blue-200">Государство</th>
                <th class="border border-blue-200">Наименование организации</th>
                <th class="border border-blue-200">Реквизиты договора (наименование, дата, номер, срок действия)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
                <td class="border text-center">4</td>
            </tr>
            @foreach ($inter as $international)
            <tr itemprop="internationalDog" class="border">
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="stateName" class="border">{{ $international->state_name }}</td>
                <td itemprop="orgName" class="border">{{ $international->org_name }}</td>
                <td itemprop="dogReg" class="border">{{ $international->dog_reg }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endforeach
@stop