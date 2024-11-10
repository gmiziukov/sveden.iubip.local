@extends('layouts.app')

@section('content')
<table class="w-full border">
    <thead>
        <tr class="border">
            <th rowspan="2" class="border">Код, шифр группы научных специальностей</th>
            <th rowspan="2" class="border">Наименование профессии, специальности, направления подготовки, наименование группы научных специальностей</th>
            <th rowspan="2" class="border">Уровень образования</th>
            <th rowspan="2" class="border">Образовательная программа, направленность, профиль, шифр и наименование научной специальности</th>
            <th rowspan="2" class="border">Курс</th>
            <th rowspan="2" class="border">Форма обучения</th>
            <th colspan="4" class="border">Количество вакантных мест для приема (перевода) на места, финансируемые за счет</th>
        </tr>
        <tr class="border">
            <th class="border">бюджетных ассигнований федерального бюджета</th>
            <th class="border">бюджетов субъектов Российской Федерации</th>
            <th class="border">местных бюджетов</th>
            <th class="border">физических и (или) юридических лиц</th>
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
            <td class="border text-center">7</td>
            <td class="border text-center">8</td>
            <td class="border text-center">9</td>
            <td class="border text-center">10</td>
        </tr>
        <tr itemprop="vacant" class="border">
            <td itemprop="eduCode" class="border">Код, шифр группы научных специальностей </td>
            <td itemprop="eduName" class="border">Наименование профессии, специальности, направления подготовки, наименование группы научных специальностей </td>
            <td itemprop="eduLevel" class="border">Уровень образования </td>
            <td itemprop="eduProf" class="border"> Образовательная программа, направленность, профиль, шифр и наименование научной специальности</td>
            <td itemprop="eduCourse" class="border"> Курс </td>
            <td itemprop="eduForm" class="border"> Форма обучения </td>
            <td itemprop="numberBFVacant" class="border">0</td>
            <td itemprop="numberBRVacant" class="border">0</td>
            <td itemprop="numberBMVacant" class="border">0</td>
            <td itemprop="numberPVacant" class="border">0</td>
        </tr>
        <tr itemprop="vacant" class="border">
            <td itemprop="eduCode" class="border">Код, шифр группы научных специальностей </td>
            <td itemprop="eduName" class="border">Наименование профессии, специальности, направления подготовки, наименование группы научных специальностей </td>
            <td itemprop="eduLevel" class="border">Уровень образования </td>
            <td itemprop="eduProf" class="border"> Образовательная программа, направленность, профиль, шифр и наименование научной специальности</td>
            <td itemprop="eduCourse" class="border"> Курс </td>
            <td itemprop="eduForm" class="border"> Форма обучения </td>
            <td itemprop="numberBFVacant" class="border">0</td>
            <td itemprop="numberBRVacant" class="border">0</td>
            <td itemprop="numberBMVacant" class="border">0</td>
            <td itemprop="numberPVacant" class="border">0</td>
        </tr>
    </tbody>
</table>
@stop