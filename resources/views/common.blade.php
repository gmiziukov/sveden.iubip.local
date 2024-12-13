@extends('layouts.app')
@section('subsection-name')
Основные сведения
@endsection
@section('content')

<div class="w-full h-full flex px-4 flex-col">
    @foreach($subsections as $subsection)
    <div class="py-2 md:text-xl text-lg px-2 w-full">{{ $subsection->name }}</div>
    @if($subsection->id == 1)
    <table class="w-full border">
        <tbody>
            @foreach($commonInfoOrganiz as $info)
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row }}</td>
                <td itemprop="fullName" class="border px-2">{{ $info->full_name }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_two }}</td>
                <td itemprop="shortName" class="border px-2">{{ $info->short_name }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_free }}</td>
                <td itemprop="regDate" class="border px-2">{{ $info->reg_date }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_four }}</td>
                <td itemprop="address" class="border px-2">{{ $info->address }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_five }}</td>
                <td class="border px-2">{{ $info->branch_representative_office_organization }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_six }}</td>
                <td itemprop="workTime" class="border px-2">{{ $info->work_time }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_seven }}</td>
                <td itemprop="telephone" class="border px-2">{{ $info->telephone }}</td>
            </tr>
            <tr class="md:text-base text-sm">
                <td class="border px-2">{{ $info->name_row_eight }}</td>
                <td itemprop="email" class="border px-2">{{ $info->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 2)
    @foreach($commonFile->where('subsection_id', 2) as $file)
    <li class="">
        <a itemprop="licenseDocLink" style="color: -webkit-link;" target="_blank" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif

    @if($subsection->id == 3)
    @foreach($commonFile->where('subsection_id', 3) as $file)
    <li class="">
        <a itemprop="accreditationDocLink" style="color: -webkit-link;" target="_blank" href="{{asset($file->path_to_file)}}">{{ $file->name_file }}</a>
    </li>
    @endforeach
    @endif


    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 4)
        <table class="w-full md:text-base text-sm border">
            <thead style="position: sticky; top:0">
                <tr class="bg-slate-200  border border-gray-300">
                    <th class="border md:font-semibold font-normal border-gray-300">Наименование учредителя</th>
                    <th class="border md:font-semibold font-normal border-gray-300">Фамилия, имя, отчество руководителя учредителя (ей) образовательной организации</th>
                    <th class="border md:font-semibold font-normal border-gray-300">Адрес местонахождения учредителя (ей)</th>
                    <th class="border md:font-semibold font-normal border-gray-300">Контактные телефоны</th>
                    <th class="border md:font-semibold font-normal border-gray-300">Адрес электронной почты</th>
                    <th class="border md:font-semibold font-normal border-gray-300">Адрес сайта учредителя (ей) в сети "Интернет"</th>
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
                <tr itemprop="uchredLaw">
                    <td itemprop="nameUchred" class="border px-2">{{ $info->name_uchred }}</td>
                    <td itemprop="hostelNum" class="border px-2">{{ $info->fio }}</td>
                    <td itemprop="addressUchred" class="border px-2">{{ $info->address_uchred }}</td>
                    <td itemprop="telUchred" class="border px-2">{{ $info->tel_uchred }}</td>
                    <td itemprop="mailUchred" class="border px-2">{{ $info->mail_uchred }}</td>
                    <td itemprop="websiteUchred" class="border px-2">{{ $info->mail_uchred }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    @if($subsection->id == 5)
    <table class="w-full border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300 md:text-base text-sm">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonPlacesEdu as $info)
            <tr class="md:text-base text-sm">
                <td itemprop="addressPlacePodg" class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlacePrac" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 6)
    <table class="w-full md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonNetwork as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlaceSet" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 7)
    <table class="w-full md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonPractic as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlacePrac" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 8)
    <table class="w-full md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonPracticStudent as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlacePodg" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 9)
    <table class="w-full md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commonGia as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlaceGia" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 10)
    <table class="w-full md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border md:font-semibold font-normal w-[6rem] border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonDpos as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlaceDop" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($subsection->id == 11)
    <table class="w-full mb-4 md:text-base text-sm border">
        <thead>
            <tr class="bg-slate-200 border border-gray-300">
                <th class="border w-[6rem] md:font-semibold font-normal border-gray-300">№ п/п</th>
                <th class="border md:font-semibold font-normal border-gray-300">Адрес места осуществления образовательной деятельности</th>

            </tr>
        </thead>
        <tbody>
            @foreach($commonOppo as $info)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                <td itemprop="addressPlaceOppo" class="border px-2">{{ $info->address_implementation_activities }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @endforeach
</div>
@stop