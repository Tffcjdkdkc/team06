@extends('app')

@section('title', 'team06 | 自來水供水普及率')

@section('content')
    <style>
        /* 設置每個資料項的顯示格式 */
        .population-info {
            display: flex;
            flex-direction: column;
            gap: 12px; /* 每個資料塊之間的間距 */
            font-size: 1.2em; /* 字體大小 */
            line-height: 1.5; /* 行距 */
            max-width: 600px; /* 限制寬度 */
            margin: 0 auto; /* 讓容器居中顯示 */
        }

        .population-info div {
            background-color: #f9f9f9; /* 每個資料塊的背景顏色 */
            padding: 10px; /* 內邊距 */
            border-radius: 8px; /* 圓角 */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* 輕微陰影 */
        }

        .population-info strong {
            font-weight: bold; /* 強調欄位名稱 */
            color: #4a90e2; /* 欄位名稱的顏色 */
        }

        h1.page-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 1.5rem;
            color: #555;
            margin-top: 20px;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        mark {
            background-color: #ff0;
        }
    </style>

    <h2>以下是隨機生成資料:</h2>

    <div class="population-info">
        <div><strong>實際供水人口:</strong> {{ $population->actual_population_served }}</div>
        <div><strong>日期:</strong> {{ \Carbon\Carbon::parse($population->date_time)->toDateString() }}</div>
        <div><strong>時間:</strong> {{ \Carbon\Carbon::parse($population->date_time)->toTimeString() }}</div>
        <div><strong>執行單位:</strong> {{ $population->executing_unit }}</div>
        <div><strong>供水人口比例:</strong> {{ $population->percentage_of_population_served }}</div>
        <div><strong>供水區域人口:</strong> {{ $population->population_in_served_area }}</div>
        <div><strong>備註:</strong> {{ $population->remarks }}</div>
    </div>
@endsection
