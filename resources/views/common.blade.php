@extends('layouts.app')
@section('subsection-name')
Основные сведения
@endsection
@section('content')

@foreach($subsections as $subsection)
<div class="py-2 text-xl px-6 w-full">{{ $subsection->name }}</div>
<div class="px-6 flex flex-col">

    @if($subsection->id == 1)
    <table class="w-full border">
        <tbody>
            @foreach($commonInfoOrganiz as $info)
            <tr class="">
                <td itemprop="interInfo" class="border px-2">{{ $info->name_row }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->full_name }}</td>
            </tr>
            <tr class="">
                <td itemprop="hostelNum" class="border px-2">{{ $info->name_row_two }}</td>
                <td itemprop="interNum" class="border px-2">{{ $info->short_name }}</td>
            </tr>
            <tr class="">
                <td itemprop="interInfo" class="border px-2">{{ $info->name_row_free }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->reg_date }}</td>
            </tr>
            <tr class="">
                <td itemprop="hostelNum" class="border px-2">{{ $info->name_row_four }}</td>
                <td itemprop="interNum" class="border px-2">{{ $info->address }}</td>
            </tr>
            <tr class="">
                <td itemprop="interInfo" class="border px-2">{{ $info->name_row_five }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->branch_representative_office_organization }}</td>
            </tr>
            <tr class="">
                <td itemprop="hostelNum" class="border px-2">{{ $info->name_row_six }}</td>
                <td itemprop="interNum" class="border px-2">{{ $info->work_time }}</td>
            </tr>
            <tr class="">
                <td itemprop="hostelNum" class="border px-2">{{ $info->name_row_seven }}</td>
                <td itemprop="interNum" class="border px-2">{{ $info->telephone }}</td>
            </tr>
            <tr class="">
                <td itemprop="interInfo" class="border px-2">{{ $info->name_row_eight }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 2)
    @foreach($commonFile->where('subsection_id', 2) as $file)
    <li class="list-none">
        <a itemprop="hostelNumOvz" style="color: -webkit-link;" target="_blank" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 3)
    @foreach($commonFile->where('subsection_id', 3) as $file)
    <li class="list-none">
        <a itemprop="localAct" style="color: -webkit-link;" target="_blank" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 50)
    @foreach($grantFile->where('subsection_id', 50) as $file)
    <li class="list-none">
        <a itemprop="localActObSt" style="color: -webkit-link;" target="_blank" href="{{$file->path_to_file}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 4)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border border-gray-300">Наименование учредителя</th>
                <th class="border border-gray-300">Фамилия, имя, отчество руководителя учредителя (ей) образовательной организации</th>
                <th class="border border-gray-300">Адрес местонахождения учредителя (ей)</th>
                <th class="border border-gray-300">Контактные телефоны</th>
                <th class="border border-gray-300">Адрес электронной почты</th>
                <th class="border border-gray-300">Адрес сайта учредителя (ей) в сети "Интернет"</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border">
                <td class="border text-center">1</td>
                <td class="border text-center">2</td>
                <td class="border text-center">3</td>
                <td class="border text-center">4</td>
                <td class="border text-center">5</td>
                <td class="border text-center">6</td>
            </tr>
        <tbody>
            @foreach($commonInfoUchred as $info)
            <tr class="">
                <td itemprop="interInfo" class="border px-2">{{ $info->name_uchred }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->fio }}</td>
                <td itemprop="interNum" class="border px-2">{{ $info->address_uchred }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->tel_uchred }}</td>
                <td itemprop="interInfo" class="border px-2">{{ $info->mail_uchred }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 5)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonPlacesEdu as $info)
            <tr class="">
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 6)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200  border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonNetwork as $info)
            <tr class="">
            <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 7)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonPractic as $info)
            <tr class="">
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    @if($subsection->id == 8)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200  border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonPracticStudent as $info)
            <tr class="">
            <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 9)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonGia as $info)
            <tr class="">
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    @if($subsection->id == 10)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200  border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonDpos as $info)
            <tr class="">
            <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 11)
    <table class="w-full mb-4 border">
        <thead>
            <tr class="bg-slate-200  border border-gray-300">
                <th class="border w-[6rem] border-gray-300">№ п/п</th>
                <th class="border border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonOppo as $info)
            <tr class="">
            <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="hostelNum" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endforeach
@stop