@extends('app')

@section('title', 'team06 | 編輯自來水供水普及率')

@section('content')
    {!! Form::model($population, ['route' => ['populations.update', $population->id], 'method' => 'put']) !!}

    <h1>編輯表單</h1>

    <div class="form-group">
        {!! Form::label('actual_population_served', '實際供水人口:') !!}
        {!! Form::text('actual_population_served', null, ['class' => 'form-control', 'id' => 'actual_population_served']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('date_time', '日期時間:') !!}
        {!! Form::input('datetime-local', 'date_time', null, ['class' => 'form-control', 'id' => 'date_time']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('executing_unit', '執行單位:') !!}
        {!! Form::select('executing_unit', [
            '台灣自來水股份有限公司(含高雄市)' => '台灣自來水股份有限公司(含高雄市)',
            '金門縣自來水廠' => '金門縣自來水廠',
            '第一區管理處' => '第一區管理處',
            '第七區管理處' => '第七區管理處',
            '第九區管理處' => '第九區管理處',
            '第二區管理處' => '第二區管理處',
            '第八區管理處' => '第八區管理處',
            '第十一區管理處' => '第十一區管理處',
            '第十二區管理處' => '第十二區管理處',
            '第十區管理處' => '第十區管理處',
            '第三區管理處' => '第三區管理處',
            '第五區管理處' => '第五區管理處',
            '第六區管理處' => '第六區管理處',
            '第四區管理處' => '第四區管理處',
            '連江縣自來水廠' => '連江縣自來水廠',
            '臺北自來水事業處' => '臺北自來水事業處'
        ], null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('percentage_of_population_served', '供水人口比例:') !!}
        {!! Form::text('percentage_of_population_served', null, ['class' => 'form-control', 'id' => 'percentage_of_population_served', 'readonly' => 'readonly']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('population_in_served_area', '供水區域人口:') !!}
        {!! Form::text('population_in_served_area', null, ['class' => 'form-control', 'id' => 'population_in_served_area']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remarks', '備註:') !!}
        {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("修改調查資料", ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    <script>
        // 自動計算供水人口比例
        window.onload = function() {
            document.getElementById('actual_population_served').addEventListener('input', calculatePercentage);
            document.getElementById('population_in_served_area').addEventListener('input', calculatePercentage);
        };

        function calculatePercentage() {
            var actualPopulation = parseFloat(document.getElementById('actual_population_served').value);
            var servedAreaPopulation = parseFloat(document.getElementById('population_in_served_area').value);

            if (!isNaN(actualPopulation) && !isNaN(servedAreaPopulation) && servedAreaPopulation > 0) {
                var percentage = (actualPopulation / servedAreaPopulation) * 100;
                document.getElementById('percentage_of_population_served').value = percentage.toFixed(2);
            } else {
                document.getElementById('percentage_of_population_served').value = '';
            }
        }
    </script>
@endsection
