<!DOCTYPE html>
<html lang="zh-Hant">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水供應統計資料</title>
    <link type="image/png" rel="icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgBAMAAACBVGfHAAAALVBMVEUmveJny+jJ6vb////f8/mH1OxVx+b1+/295vSw4vLq9/tAwuTU7/ej3fB40OoWp3LjAAAAVElEQVR4AWMYUMCobBKAIpBubGyKItBsNNkIRWCxNYs5ioCxAY8xmgCQwC9gYXwaVcDY2BZVwO6xCZoZzMaUCiy23myO5jllI3TvG6IFkNGDAY0hAIVkENcDVJn9AAAAAElFTkSuQmCC">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            position: relative;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background: white;
        }

        h1 {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* 查詢表單美化 */
        .form-group {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #333;
            margin-right: 15px;
        }

        .form-group input {
            max-width: 250px;
            width: 100%;
            border-radius: 30px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(24, 27, 233, 0.5);
        }

        .form-group button {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1.1rem;
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #ca2f70;
        }

        /* 查詢結果 */
        .results {
            margin-top: 20px;
            font-size: 1.2rem;
            text-align: center;
            color: #555;
        }

        .table {
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .pagination .page-link {
            border-radius: 20px;
            padding: 8px 16px;
            color: #007bff;
        }
        .pagination .page-item.disabled .page-link {
            color: #ccc; /* 禁用的頁碼顯示灰色 */
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
        footer {
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            margin-top: 40px;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
        .page-query-box {
            display: flex;  /* 設置為 flexbox 使元素排列在一行 */
            justify-content: space-between;  /* 使元素左右對齊 */
            align-items: center;  /* 垂直居中對齊 */
            margin-top: 10px;  /* 可以調整間距 */
        }

        .page-query-box label {
            margin-right: 10px;  /* 為 label 和 select 之間添加間距 */
        }

        .page-query-box select {
            font-size: 0.9rem;  /* 設置字體大小 */
            border-radius: 30px;
            padding: 5px 10px;
            border: 1px solid #ccc;
        }   
        .pagination {
            margin-bottom: 0; /* 取消底部空間，讓分頁區塊更加緊湊 */
        }

</style>

</head>
<body>
   
<div class="container mt-5" style="position: relative;">
        <!-- 右上角的主頁連結 -->
    <a href="{{ url('/sdgs') }}" class="homepage-link">
            <i class="fas fa-home"></i> 可持續發展目標SDGs
    </a>
    <div class="container">
        <div class="card p-4">
            <h1 class="text-center">自來水供水普及率查詢</h1>
    
            <!-- 查詢表單 -->
            <form method="GET" action="{{ url('/water') }}" class="text-center">
                <div class="form-group">
                    <label for="ExecutingUnit">查詢機構別：</label>
                    <input type="text" class="form-control" id="ExecutingUnit" name="ExecutingUnit" placeholder="輸入機構別名稱" value="{{ request('ExecutingUnit') }}">
                    <button type="submit" class="btn btn-primary">查詢</button>
                </div>
            </form>
            <!-- 查詢結果顯示資料筆數 -->
            @if(request()->has('ExecutingUnit'))
               <p class="results">共查詢到 {{ $statistics->total() }} 筆資料</p>
            @endif
           <!-- 表格顯示資料 -->
        <div class="table-responsive mt-4">
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
                    @forelse ($statistics as $statistic)
                        <tr>
                            <td>{{ $statistic->ExecutingUnit }}</td>
                            <td>{{ $statistic->DateTime }}</td>
                            <td>{{ $statistic->ActualPopulationServed }}</td>
                            <td>{{ $statistic->PercentageOfPopulationServed }}%</td>
                            <td>{{ $statistic->PopulationInServedArea }}</td>
                            <td>{{ $statistic->Remarks ?? '無' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">沒有資料可顯示</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>



        <!-- 分頁 -->
        <div class="mt-3">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="pagination justify-content-center flex-grow-1">
                    <!-- 第一頁 -->
                    @if ($statistics->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-fast-backward"></i></span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $statistics->url(1) }}&ExecutingUnit={{ request('ExecutingUnit') }}" aria-label="First">
                                    <i class="fas fa-fast-backward"></i>
                                </a>
                            </li>
                        @endif

                    <!-- 上一頁 -->
                    @if ($statistics->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-arrow-left"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $statistics->previousPageUrl() }}&ExecutingUnit={{ request('ExecutingUnit') }}" aria-label="Previous">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </li>
                @endif

                                    <!-- 顯示頁碼範圍 -->
                    @php
                    $currentPage = $statistics->currentPage();
                    $startPage = max(1, $currentPage - 2);  // 頁碼範圍的開始頁，確保最小值為 1
                    $endPage = min($startPage + 4, $statistics->lastPage());  // 頁碼範圍的結束頁，確保不超過最大頁數

                    // 如果頁碼範圍的結束頁小於總頁數，則調整起始頁
                    if ($endPage - $startPage < 4) {
                        $startPage = max(1, $endPage - 4);
                    }
                    @endphp

                    @for ($page = $startPage; $page <= $endPage; $page++)
                    <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                        <a class="page-link" href="{{ $statistics->url($page) }}&ExecutingUnit={{ request('ExecutingUnit') }}">
                            {{ $page }}
                        </a>
                    </li>
                    @endfor
                    <!-- 下一頁 -->
                    @if ($statistics->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $statistics->nextPageUrl() }}&ExecutingUnit={{ request('ExecutingUnit') }}" aria-label="Next">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link"><i class="fas fa-arrow-right"></i></span>
                            </li>
                        @endif

                    <!-- 最後一頁 -->
                    @if ($statistics->currentPage() == $statistics->lastPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fas fa-fast-forward"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $statistics->url($statistics->lastPage()) }}&ExecutingUnit={{ request('ExecutingUnit') }}" aria-label="Last">
                            <i class="fas fa-fast-forward"></i>
                        </a>
                    </li>
                @endif
            </ul>
                <!-- 跳至頁數 -->
                <div class="page-query-box text-center mt-4">
                    <form action="{{ url('/water') }}" method="GET">
                        <input type="hidden" name="ExecutingUnit" value="{{ request('ExecutingUnit') }}">
                        <label for="page-query" class="mr-2">跳至頁數：</label>
                        <select name="page" class="form-control d-inline-block" onchange="this.form.submit()">
                            @for ($page = 1; $page <= $statistics->lastPage(); $page++)
                                <option value="{{ $page }}" {{ request('page') == $page ? 'selected' : '' }}>
                                    第 {{ $page }}
                                </option>
                            @endfor
                        </select>
                    </form>
                </div>
            </div>
        </div>
       
               

        
<footer>
    <p>資料來源: <a href="https://data.gov.tw/dataset/8989" target="_blank">https://data.gov.tw/dataset/8989</a></p>
</footer>



</body>

</html>