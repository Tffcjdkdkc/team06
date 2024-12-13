<!-- resources/views/water/edit.blade.php -->
@extends('water.body')

@section('title', '編輯自來水供水普及率資料')

@section('content')
    <h1 class="text-center">編輯自來水供水普及率資料</h1>

    <form action="{{ route('WaterSupplyStatistic.update', $statistic->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="ExecutingUnit">機構別:</label>
            <input type="text" class="form-control" name="ExecutingUnit" id="ExecutingUnit" value="{{ $statistic->ExecutingUnit }}" required>
        </div>

        <div class="form-group">
            <label for="DateTime">日期時間:</label>
            <input type="datetime-local" class="form-control" name="DateTime" id="DateTime" value="{{ \Carbon\Carbon::parse($statistic->DateTime)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="ActualPopulationServed">實際供水人口:</label>
            <input type="number" class="form-control" name="ActualPopulationServed" id="ActualPopulationServed" value="{{ $statistic->ActualPopulationServed }}" required>
        </div>

        <div class="form-group">
            <label for="PercentageOfPopulationServed">供水普及率:</label>
            <input type="text" class="form-control" name="PercentageOfPopulationServed" id="PercentageOfPopulationServed" value="{{ $statistic->PercentageOfPopulationServed }}" readonly>
        </div>

        <div class="form-group">
            <label for="PopulationInServedArea">供水區域人口:</label>
            <input type="number" class="form-control" name="PopulationInServedArea" id="PopulationInServedArea" value="{{ $statistic->PopulationInServedArea }}" required>
        </div>

        <div class="form-group">
            <label for="Remarks">備註:</label>
            <textarea class="form-control" name="Remarks" id="Remarks">{{ $statistic->Remarks }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新資料</button>
    </form>
@endsection
