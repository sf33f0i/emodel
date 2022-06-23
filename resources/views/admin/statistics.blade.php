@extends('layouts.layout')
@section('title')
    <h1 style="font-size: 28px">Статистика</h1>
@endsection
@section('content')
<div style="display: flex;flex-wrap: wrap">
    <div class="statistic_container">
        <span style="font-size: 36px;color: #000000;margin-bottom: 30px"> Заказы:</span>
        <span class="text_stat"> Всего: {{$orders}}</span>
        <span class="text_stat"> Прибыль с заказов: {{$sum_price}} RUB</span>
        <span class="text_stat"> Срерняя стоимость заказа: {{$avg_price}} RUB</span>

    </div>
    <div class="statistic_container">
        <span style="font-size: 36px;color: #000000;margin-bottom: 30px"> Прогресс:</span>
        <span class="text_stat">Ожидает сборки: {{$wait}}</span>
        <span class="text_stat">В процессе сборки: {{$process}}</span>
        <span class="text_stat">Доставка: {{$dostavka}}</span>
        <span class="text_stat">Готово: {{$done}}</span>
    </div>
</div>
@endsection
