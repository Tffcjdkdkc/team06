<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>水供應統計資料</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

      
    <style>
        /* 自訂分頁樣式 */
        .pagination .page-link {
            color: #007bff;
            border: 1px solid #007bff;
            font-size: 1.1rem;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .pagination .page-link:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .pagination .disabled .page-link {
            color: #6c757d;
            border-color: #ddd;
        }

        .page-query-box {
            margin-top: 10px;
            display: flex;
            align-items: center;
        }

        .page-query-box select {
            width: 100px;
            margin-right: 10px;
        }

        /* 資料來源樣式 */
        footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            margin-top: 30px;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container mt-5" style="position: relative;">
        <!-- 右上角的主頁連結 -->
        <a href="{{ url('/sdgs') }}" class="homepage-link">
            <i class="fas fa-home"></i> 可持續發展目標SDGs
        </a>
    <div class="card">
        <h1 class="text-center mb-4">自來水供水普及率</h1>

        <!-- 查詢表單 -->
        <form method="GET" action="{{ url('/water') }}">
            <div class="form-group">
                <label for="ExecutingUnit">查詢機構別：
                    <br>
                    半年報；按機構別(台灣自來水公司(一至十二區管理處)、臺北自來水事業處、金門、連江自來水廠)，提供人數計算之自來水供水普及率
                    </p>
                </label>
                <input type="text" class="form-control" id="ExecutingUnit" name="ExecutingUnit" placeholder="輸入機構別名稱" value="{{ request('ExecutingUnit') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-block">查詢</button>
        </form>

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
            <nav>
                <ul class="pagination justify-content-center">
                    <!-- 第一頁 -->
                    @if ($statistics->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fas fa-fast-backward"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $statistics->url(1) }}" aria-label="First">
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
                            <a class="page-link" href="{{ $statistics->previousPageUrl() }}" aria-label="Previous">
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
                            <a class="page-link" href="{{ $statistics->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor


                    <!-- 下一頁 -->
                    @if ($statistics->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $statistics->nextPageUrl() }}" aria-label="Next">
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
                            <a class="page-link" href="{{ $statistics->url($statistics->lastPage()) }}" aria-label="Last">
                                <i class="fas fa-fast-forward"></i>
                            </a>
                        </li>
                    @endif
        

            <!-- 查詢頁碼 -->
        <div class="page-query-box d-flex align-items-center ml-3">
            <form action="{{ url('/water') }}" method="GET" class="form-inline">
                <label for="page-query" class="mr-2">跳至頁數：</label>
                <select name="page" class="form-control mr-2" onchange="this.form.submit()">
                    @for ($page = 1; $page <= $statistics->lastPage(); $page++)
                        <option value="{{ $page }}" {{ request('page') == $page ? 'selected' : '' }}>
                            第 {{ $page }} 
                        </option>
                    @endfor
                </select>
            </form>
        </div>
            
           
        </ul> 
   </nav>
   <footer>
    <p>資料來源: <a href="https://data.gov.tw/dataset/8989" target="_blank">https://data.gov.tw/dataset/8989</a></p>
</footer>