<!-- resources/views/water/show.blade.php -->
@extends('water.body') <!-- Assuming this is your layout -->

@section('content')
    <div class="container">
        <h1 class="text-center">水供應統計詳情</h1>

        <div class="mt-4">
            <h3>機構別: {{ $statistic->ExecutingUnit }}</h3>
            <p><strong>統計日期時間:</strong> {{ $statistic->DateTime }}</p>
            <p><strong>實際供水人數:</strong> {{ $statistic->ActualPopulationServed }}</p>
            <p><strong>供水普及率:</strong> {{ $statistic->PercentageOfPopulationServed }}%</p>
            <p><strong>行政區域人數:</strong> {{ $statistic->PopulationInServedArea }}</p>
            <p><strong>備註:</strong> {{ $statistic->Remarks ?? '無' }}</p>
        </div>

        <!-- 返回按鈕 -->
        <div class="mt-4 text-center">
            <a href="{{ url('/water') }}" class="btn btn-secondary">返回列表</a>
        </div>
    </div>
@endsection
