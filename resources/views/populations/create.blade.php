@extends('app')

@section('title', 'team06 | 自來水供水普及率')

@section('content')
<style>
    /* 設置整體頁面樣式 */
    .page-title {
        font-size: 2rem;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
        font-weight: bold;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        gap: 20px; /* 每個表單項目之間的間距 */
        max-width: 600px; /* 設置表單的最大寬度 */
        margin: 0 auto; /* 讓表單居中顯示 */
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* 添加陰影效果 */
    }

    /* 設置 label 文字顏色 */
    .form-group label {
        font-weight: bold;
        color: #4a90e2;  /* 設置文字顏色為藍色 */
        margin-bottom: 8px;
    }

    .form-group input {
        padding: 10px;
        font-size: 1rem;
        border-radius: 6px;
        border: 1px solid #ccc;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #4a90e2;
        outline: none;
    }

    .form-group button {
        padding: 12px;
        font-size: 1rem;
        background-color: #4a90e2;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-group button:hover {
        background-color: #357ab7;
    }

    .form-group button:focus {
        outline: none;
    }
</style>


<h1 class="page-title"><a href="http://127.0.0.1:8000/populations">自來水供水普及率</a></h1>

新增表單
{!! Form::open(['route' => 'populations.store']) !!}

    <div class="form-group">
        {!! Form::label('actual_population_served','實際供水人口:') !!}
        {!! Form::text('actual_population_served',null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('date_time','日期時間:') !!}
        {!! Form::text('date_time',null, ['class' => 'form-control' ]) !!}

    </div>
    <div class="form-group">
        {!! Form::label('executing_unit','執行單位:') !!}
        {!! Form::text('executing_unit',null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('percentage_of_population_served','供水人口比例:') !!}
        {!! Form::text('percentage_of_population_served',null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('population_in_served_area','供水區域人口:') !!}
        {!! Form::text('population_in_served_area',null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('remarks','備註:') !!}
        {!! Form::text('remarks',null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit("新增調查資料", ['class' => 'btn btn-primary form-control' ]) !!}
    </div>



{!! Form::close() !!}

@endsection