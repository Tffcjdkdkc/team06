@extends('water.body')

@section('content')
    <div class="container">
        <h1 class="text-center">新增自來水供水普及率資料</h1>

        <form method="POST" action="{{ route('WaterSupplyStatistic.store') }}">
            @csrf

            <!-- 機構別 -->
            <div class="form-group">
                <label for="ExecutingUnit">機構別</label>
                <input type="text" class="form-control @error('ExecutingUnit') is-invalid @enderror" id="ExecutingUnit" name="ExecutingUnit" placeholder="輸入機構別" value="{{ old('ExecutingUnit') }}" required>
                @error('ExecutingUnit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- 統計日期時間 -->
            <div class="form-group">
                <label for="DateTime">統計日期時間</label>
                <input type="datetime-local" class="form-control @error('DateTime') is-invalid @enderror" id="DateTime" name="DateTime" value="{{ old('DateTime') }}" required>
                @error('DateTime')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- 實際供水人數 -->
            <div class="form-group">
                <label for="ActualPopulationServed">實際供水人數</label>
                <input type="number" class="form-control @error('ActualPopulationServed') is-invalid @enderror" id="ActualPopulationServed" name="ActualPopulationServed" value="{{ old('ActualPopulationServed') }}" required>
                @error('ActualPopulationServed')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- 供水普及率 -->
            <div class="form-group">
                <label for="PercentageOfPopulationServed">供水普及率 (%)</label>
                <input type="number" class="form-control" id="PercentageOfPopulationServed" name="PercentageOfPopulationServed" value="{{ old('PercentageOfPopulationServed') }}" readonly>
            </div>
            

            <!-- 行政區域人數 -->
            <div class="form-group">
                <label for="PopulationInServedArea">行政區域人數</label>
                <input type="number" class="form-control @error('PopulationInServedArea') is-invalid @enderror" id="PopulationInServedArea" name="PopulationInServedArea" value="{{ old('PopulationInServedArea') }}" required>
                @error('PopulationInServedArea')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- 備註 -->
            <div class="form-group">
                <label for="Remarks">備註</label>
                <textarea class="form-control @error('Remarks') is-invalid @enderror" id="Remarks" name="Remarks">{{ old('Remarks') }}</textarea>
                @error('Remarks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">儲存資料</button>
        </form>
    </div>
@endsection
