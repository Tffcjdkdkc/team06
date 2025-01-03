@extends('water.body')
@extends('app') 
@section('content')
@include('message.list')
    <div class="container">
        <h1 class="text-center">新增自來水供水普及率資料</h1>

        <form method="POST" action="{{ route('WaterSupplyStatistic.store') }}">
            @csrf

                    <!-- 機構別 (Dropdown) -->
        <div class="form-group">
            <label for="ExecutingUnit">機構別</label>
            <select class="form-control @error('ExecutingUnit') is-invalid @enderror" id="ExecutingUnit" name="ExecutingUnit" required style="border-radius: 15px; width: 35%;">
                <option value="" disabled selected>選擇機構別</option>
                <option value="台灣自來水股份有限公司(含高雄市)">台灣自來水股份有限公司(含高雄市)</option>
                <option value="第一區管理處">第一區管理處</option>
                <option value="第二區管理處">第二區管理處</option>
                <option value="第三區管理處">第三區管理處</option>
                <option value="第四區管理處">第四區管理處</option>
                <option value="第五區管理處">第五區管理處</option>
                <option value="第六區管理處">第六區管理處</option>
                <option value="第七區管理處">第七區管理處</option>
                <option value="第八區管理處">第八區管理處</option>
                <option value="第九區管理處">第九區管理處</option>
                <option value="第十區管理處">第十區管理處</option>
                <option value="第十一區管理處">第十一區管理處</option>
                <option value="第十二區管理處">第十二區管理處</option>
                <option value="臺北自來水事業處">臺北自來水事業處</option>
                <option value="金門自來水廠">金門自來水廠</option>
                <option value="連江縣自來水廠">連江縣自來水廠</option>
            </select>
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
            <a href="{{ url('/water') }}" class="btn btn-secondary">返回列表</a>
        </form>
    </div>

    <script>
        document.addEventListener('input', function () {
    var actualPopulationServed = document.getElementById('ActualPopulationServed').value;
    var populationInServedArea = document.getElementById('PopulationInServedArea').value;
    var executingUnit = document.getElementById('ExecutingUnit').value;
    var percentageField = document.getElementById('PercentageOfPopulationServed');
    var actualPopulationField = document.getElementById('ActualPopulationServed');
    var populationInServedAreaField = document.getElementById('PopulationInServedArea');

    // Define ranges for each executing unit
    var populationRanges = {
        '台灣自來水股份有限公司(含高雄市)': [17000000, 19514077],
        '第一區管理處': [876188, 922903],
        '第二區管理處': [2022804, 2437255],
        '第三區管理處': [1362672, 1565067],
        '第四區管理處': [3167229, 3338275],
        '第五區管理處': [1407612, 1554695],
        '第六區管理處': [1862440, 1866307],
        '第七區管理處': [2843186, 3743627],
        '第八區管理處': [449890, 460426],
        '第九區管理處': [317489, 344087],
        '第十區管理處': [211544, 235957],
        '第十一區管理處': [1239048, 1288658],
        '第十二區管理處': [1990195, 2124371],
        '臺北自來水事業處': [3748177, 3856621],
        '金門自來水廠': [76491, 144149],
        '連江縣自來水廠': [9814, 14039]
    };

    var percentageRanges = {
        '台灣自來水股份有限公司(含高雄市)': [90.0, 94.9],
        '第一區管理處': [92.15, 93.9],
        '第二區管理處': [93.71, 97.8],
        '第三區管理處': [81.93, 92.1],
        '第四區管理處': [88.79, 94.4],
        '第五區管理處': [92.99, 95.17],
        '第六區管理處': [98.62, 99.0],
        '第七區管理處': [82.85, 96.77],
        '第八區管理處': [91.15, 95.85],
        '第九區管理處': [82.55, 90.14],
        '第十區管理處': [77.62, 85.91],
        '第十一區管理處': [93.49, 95.27],
        '第十二區管理處': [98.86, 99.23],
        '臺北自來水事業處': [99.51, 99.6],
        '金門自來水廠': [94.46, 94.55],
        '連江縣自來水廠': [86.72, 94.41]
    };

    if (executingUnit && populationRanges[executingUnit]) {
        var minPop = populationRanges[executingUnit][0];
        var maxPop = populationRanges[executingUnit][1];
        var minPercentage = percentageRanges[executingUnit][0];
        var maxPercentage = percentageRanges[executingUnit][1];

        // 限制行政區域人數的範圍
        if (populationInServedArea < minPop) {
            populationInServedAreaField.setCustomValidity('行政區域人數必須大於等於 ' + minPop);
        } else if (populationInServedArea > maxPop) {
            populationInServedAreaField.setCustomValidity('行政區域人數必須小於等於 ' + maxPop);
        } else {
            populationInServedAreaField.setCustomValidity('');
        }

        // 計算並限制供水普及率的範圍
        if (actualPopulationServed && populationInServedArea) {
            var percentage = (actualPopulationServed / populationInServedArea) * 100;
            percentageField.value = percentage.toFixed(2);

            // 限制供水普及率的範圍
            if (percentage < minPercentage) {
                percentageField.setCustomValidity('供水普及率必須大於等於 ' + minPercentage + '%');
            } else if (percentage > maxPercentage) {
                percentageField.setCustomValidity('供水普及率必須小於等於 ' + maxPercentage + '%');
            } else {
                percentageField.setCustomValidity('');
            }
        }

        // 限制實際供水人數的範圍
        if (actualPopulationServed < 0) {
            actualPopulationField.setCustomValidity('實際供水人數不能為負數');
        } else {
            actualPopulationField.setCustomValidity('');
        }
    }
});

    </script>

@endsection
