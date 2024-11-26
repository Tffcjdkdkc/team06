<!-- resources/views/water.blade.php -->
@extends('water.app') <!-- 擴展自 water/app.blade.php 這個佈局 -->

@extends('water.body') 

@section('content')
   

         
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
        
 @endsection
               