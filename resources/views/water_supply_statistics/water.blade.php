<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水供應統計資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>水供應統計資料</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>機構別</th>
                <th>統計日期時間</th>
                <th>實際供水人數</th>
                <th>供水普及率</th>
                <th>行政區域人數</th>
                <th>備註</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->ExecutingUnit }}</td>
                    <td>{{ $statistic->DateTime }}</td>
                    <td>{{ $statistic->ActualPopulationServed }}</td>
                    <td>{{ $statistic->PercentageOfPopulationServed }}%</td>
                    <td>{{ $statistic->PopulationInServedArea }}</td>
                    <td>{{ $statistic->Remarks ?? '無' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
