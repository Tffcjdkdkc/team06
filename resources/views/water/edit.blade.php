<!-- resources/views/water/edit.blade.php -->
@extends('water.body')
@extends('app') 
@section('title', '編輯自來水供水普及率資料')

@section('content')
<div class="container">
    <h1 class="text-center">編輯自來水供水普及率資料</h1>

    <form action="{{ route('WaterSupplyStatistic.update', $statistic->id) }}" method="POST">
        @csrf
        @method('PUT')


        <!-- 機構別 (Dropdown) -->
        <div class="form-group">
            <label for="ExecutingUnit">機構別:</label>
            <select class="form-control @error('ExecutingUnit') is-invalid @enderror" id="ExecutingUnit" name="ExecutingUnit" required style="border-radius: 15px; width: 35%;">
                <option value="" disabled>選擇機構別</option>
                <option value="台灣自來水股份有限公司(含高雄市)" @if($statistic->ExecutingUnit == '台灣自來水股份有限公司(含高雄市)') selected @endif>台灣自來水股份有限公司(含高雄市)</option>
                <option value="第一區管理處" @if($statistic->ExecutingUnit == '第一區管理處') selected @endif>第一區管理處</option>
                <option value="第二區管理處" @if($statistic->ExecutingUnit == '第二區管理處') selected @endif>第二區管理處</option>
                <option value="第三區管理處" @if($statistic->ExecutingUnit == '第三區管理處') selected @endif>第三區管理處</option>
                <option value="第四區管理處" @if($statistic->ExecutingUnit == '第四區管理處') selected @endif>第四區管理處</option>
                <option value="第五區管理處" @if($statistic->ExecutingUnit == '第五區管理處') selected @endif>第五區管理處</option>
                <option value="第六區管理處" @if($statistic->ExecutingUnit == '第六區管理處') selected @endif>第六區管理處</option>
                <option value="第七區管理處" @if($statistic->ExecutingUnit == '第七區管理處') selected @endif>第七區管理處</option>
                <option value="第八區管理處" @if($statistic->ExecutingUnit == '第八區管理處') selected @endif>第八區管理處</option>
                <option value="第九區管理處" @if($statistic->ExecutingUnit == '第九區管理處') selected @endif>第九區管理處</option>
                <option value="第十區管理處" @if($statistic->ExecutingUnit == '第十區管理處') selected @endif>第十區管理處</option>
                <option value="第十一區管理處" @if($statistic->ExecutingUnit == '第十一區管理處') selected @endif>第十一區管理處</option>
                <option value="第十二區管理處" @if($statistic->ExecutingUnit == '第十二區管理處') selected @endif>第十二區管理處</option>
                <option value="臺北自來水事業處" @if($statistic->ExecutingUnit == '臺北自來水事業處') selected @endif>臺北自來水事業處</option>
                <option value="金門自來水廠" @if($statistic->ExecutingUnit == '金門自來水廠') selected @endif>金門自來水廠</option>
                <option value="連江縣自來水廠" @if($statistic->ExecutingUnit == '連江縣自來水廠') selected @endif>連江縣自來水廠</option>
            </select>
            @error('ExecutingUnit')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
                <!-- 返回按鈕 -->
    
       <a href="{{ url('/water') }}" class="btn btn-secondary">返回列表</a>
      
    </form>
</div>

@endsection
