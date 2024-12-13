@extends('app') <!-- 繼承主要佈局 -->

@section('title', '新增自來水供水普及率')

@section('content')
    <h1>新增自來水供水普及率資料</h1>

    <!-- 新增表單 -->
    <form action="{{ route('WaterSupplyStatistic.store') }}" method="POST">
        @csrf <!-- 防止 CSRF 攻擊 -->
        
        <div class="form-group">
            <label for="ExecutingUnit">機構別:</label>
            <input type="text" class="form-control" name="ExecutingUnit" id="ExecutingUnit" required>
        </div>

        <div class="form-group">
            <label for="DateTime">日期時間:</label>
            <input type="datetime-local" class="form-control" name="DateTime" id="DateTime" required>
        </div>

        <div class="form-group">
            <label for="ActualPopulationServed">實際供水人口:</label>
            <input type="number" class="form-control" name="ActualPopulationServed" id="ActualPopulationServed" required>
        </div>

        <div class="form-group">
            <label for="PercentageOfPopulationServed">供水普及率:</label>
            <input type="text" class="form-control" name="PercentageOfPopulationServed" id="PercentageOfPopulationServed" readonly>
        </div>

        <div class="form-group">
            <label for="PopulationInServedArea">供水區域人口:</label>
            <input type="number" class="form-control" name="PopulationInServedArea" id="PopulationInServedArea" required>
        </div>

        <div class="form-group">
            <label for="Remarks">備註:</label>
            <textarea class="form-control" name="Remarks" id="Remarks"></textarea>
        </div>

        <!-- 提交按鈕 -->
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
@endsection
