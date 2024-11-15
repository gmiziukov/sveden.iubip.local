@extends('layouts.app')
@section('subsection-name')
Вакантные места для приема (перевода) обучающихся
@endsection
@section('content')

<div class="px-4 flex flex-col w-full h-full">
    @foreach($subsections as $subsection)
    <div class="py-2 text-xl px-2 w-full">{{ $subsection->name }}</div>

    <div class="w-full overflow-auto md:overflow-hidden">
        @if($subsection->id == 55)
        <table class="w-full mb-4 md:text-base text-sm border">
            <thead>
                <tr class="bg-slate-200 border border-gray-300">
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Код, шифр группы научных специальностей</th>
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Наименование профессии, специальности, направления подготовки, наименование группы научных специальностей</th>
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Уровень образования</th>
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Образовательная программа, направленность, профиль, шифр и наименование научной специальности</th>
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Курс</th>
                    <th rowspan="2" class="border border-gray-300 md:font-semibold font-normal">Форма обучения</th>
                    <th colspan="4" class="border border-gray-300 md:font-semibold font-normal">Количество вакантных мест для приема (перевода) на места, финансируемые за счет</th>
                </tr>
                <tr class="border border-gray-300 bg-slate-200">
                    <th class="border border-gray-300 md:font-semibold font-normal">бюджетных ассигнований федерального бюджета</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">бюджетов субъектов Российской Федерации</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">местных бюджетов</th>
                    <th class="border border-gray-300 md:font-semibold font-normal">физических и (или) юридических лиц</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border">
                    <td class="border border-slate-300 text-center">1</td>
                    <td class="border border-slate-300 text-center">2</td>
                    <td class="border border-slate-300 text-center">3</td>
                    <td class="border border-slate-300 text-center">4</td>
                    <td class="border border-slate-300 text-center">5</td>
                    <td class="border border-slate-300 text-center">6</td>
                    <td class="border border-slate-300 text-center">7</td>
                    <td class="border border-slate-300 text-center">8</td>
                    <td class="border border-slate-300 text-center">9</td>
                    <td class="border border-slate-300 text-center">10</td>
                </tr>
                @foreach ($vacancies as $vacant)
                <tr itemprop="vacant" class="text-justify">
                    <td itemprop="eduCode" class="border border-slate-300 px-2">{{ $vacant->edu_code }}</td>
                    <td itemprop="eduName" class="border border-slate-300 px-2">{{ $vacant->edu_name }}</td>
                    <td itemprop="eduLevel" class="border border-slate-300 px-2">{{ $vacant->edu_level }}</td>
                    <td itemprop="eduProf" class="border border-slate-300 text-center">{{ $vacant->edu_prof }}</td>
                    <td itemprop="eduCourse" class="border border-slate-300 text-center">{{ $vacant->edu_course }}</td>
                    <td itemprop="eduForm" class="border border-slate-300 text-center">{{ $vacant->edu_form }}</td>
                    <td itemprop="numberBFVacant" class="border border-slate-300 text-center">{{ $vacant->number_bf_vacant }}</td>
                    <td itemprop="numberBRVacant" class="border border-slate-300 text-center">{{ $vacant->number_br_vacant }}</td>
                    <td itemprop="numberBMVacant" class="border border-slate-300 text-center">{{ $vacant->number_bm_vacant }}</td>
                    <td itemprop="numberPVacant" class="border border-slate-300 text-center">{{ $vacant->number_p_vacant }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endforeach

@stop