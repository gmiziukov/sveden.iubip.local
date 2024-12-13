@extends('layouts.app')
@section('subsection-name')
Международное сотрудничество
@endsection
@section('content')
@foreach($subsections as $subsection)
<div class="px-4 w-full h-full flex flex-col">

    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>
    @if($subsection->id == 56)
    <table class="w-full mb-4 border">
        <thead>
            <tr class="bg-slate-200 md:text-base text-sm border border-gray-300">
                <th class="border w-[5rem] md:font-semibold font-normal border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Государство</th>
                <th class="border md:font-semibold font-normal border-gray-300">Наименование организации</th>
                <th class="border md:font-semibold font-normal border-gray-300">Реквизиты договора (наименование, дата, номер, срок действия)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border md:text-base text-sm">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
                <td class="border text-center">4</td>
            </tr>
            @foreach ($inter as $international)
            <tr itemprop="internationalDog" class="border md:text-base text-sm">
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="stateName" class="border">{{ $international->state_name }}</td>
                <td itemprop="orgName" class="border">{{ $international->org_name }}</td>
                <td itemprop="dogReg" class="border">{{ $international->dog_reg }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endforeach
</div>
@stop