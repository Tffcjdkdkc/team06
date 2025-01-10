<!-- resources/views/water.blade.php -->
@extends('water.body') <!-- 擴展自 water/app.blade.php 這個佈局 -->

@extends('app') 

@section('content')
   

         
                <h1 class="text-center">自來水供水普及率查詢</h1>
        
<!-- 查詢表單 -->
<form method="GET" action="{{ url('/water') }}" class="text-center">
    <div class="form-group">
        <label for="ExecutingUnit">查詢機構別：</label>
        <select class="form-control form-control-sm @error('ExecutingUnit') is-invalid @enderror" id="ExecutingUnit" name="ExecutingUnit" style="width: 200px;"> <!-- Set the width here -->
            <option value="" disabled selected>選擇機構別</option>
            <option value="台灣自來水股份有限公司(含高雄市)" {{ request('ExecutingUnit') == '台灣自來水股份有限公司(含高雄市)' ? 'selected' : '' }}>台灣自來水股份有限公司(含高雄市)</option>
            <option value="第一區管理處" {{ request('ExecutingUnit') == '第一區管理處' ? 'selected' : '' }}>第一區管理處</option>
            <option value="第二區管理處" {{ request('ExecutingUnit') == '第二區管理處' ? 'selected' : '' }}>第二區管理處</option>
            <option value="第三區管理處" {{ request('ExecutingUnit') == '第三區管理處' ? 'selected' : '' }}>第三區管理處</option>
            <option value="第四區管理處" {{ request('ExecutingUnit') == '第四區管理處' ? 'selected' : '' }}>第四區管理處</option>
            <option value="第五區管理處" {{ request('ExecutingUnit') == '第五區管理處' ? 'selected' : '' }}>第五區管理處</option>
            <option value="第六區管理處" {{ request('ExecutingUnit') == '第六區管理處' ? 'selected' : '' }}>第六區管理處</option>
            <option value="第七區管理處" {{ request('ExecutingUnit') == '第七區管理處' ? 'selected' : '' }}>第七區管理處</option>
            <option value="第八區管理處" {{ request('ExecutingUnit') == '第八區管理處' ? 'selected' : '' }}>第八區管理處</option>
            <option value="第九區管理處" {{ request('ExecutingUnit') == '第九區管理處' ? 'selected' : '' }}>第九區管理處</option>
            <option value="第十區管理處" {{ request('ExecutingUnit') == '第十區管理處' ? 'selected' : '' }}>第十區管理處</option>
            <option value="第十一區管理處" {{ request('ExecutingUnit') == '第十一區管理處' ? 'selected' : '' }}>第十一區管理處</option>
            <option value="第十二區管理處" {{ request('ExecutingUnit') == '第十二區管理處' ? 'selected' : '' }}>第十二區管理處</option>
            <option value="臺北自來水事業處" {{ request('ExecutingUnit') == '臺北自來水事業處' ? 'selected' : '' }}>臺北自來水事業處</option>
            <option value="金門自來水廠" {{ request('ExecutingUnit') == '金門自來水廠' ? 'selected' : '' }}>金門自來水廠</option>
            <option value="連江縣自來水廠" {{ request('ExecutingUnit') == '連江縣自來水廠' ? 'selected' : '' }}>連江縣自來水廠</option>
        </select>
        <button type="submit" class="btn btn-primary">查詢</button>
    </div>
</form>

                <!-- 查詢結果顯示資料筆數 -->
                @if(request()->has('ExecutingUnit'))
                <p class="results">共查詢到 {{ $statistics->total() }} 筆資料</p>
                @endif

                                <!-- 根據用戶角色顯示新增按鈕 -->
                @can('admin') <!-- 只有 admin 可以看到新增按鈕 -->
                <a href="{{ route('WaterSupplyStatistic.create') }}" class="btn btn-success">新增</a>
            @endcan

            <!-- 表格顯示資料 -->
            <div class="table-responsive mt-4">
                <table class="table table-bordered">    
                    <thead>   
                        <tr>
                            <th>機構別</th>
                            <th>統計日期時間</th>
                            <th>實際供水<br>人數</th>
                            <th>供水普及率</th>
                            <th>行政區域<br>人數</th>
                            <th>備註</th>
                            <th>顯<br>示</th>
                            <th>編<br>輯</th>
                            <th>刪<br>除</th>
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
                                <!-- 顯示按鈕 -->
                                <td>
                                <a href="{{ route('WaterSupplyStatistic.show', $statistic->id) }}" class="btn btn-info">顯示</a>
                                </td>
                                
                            <!-- 編輯按鈕 -->
                            @if (auth()->user()->can('manager') || auth()->user()->can('admin')) <!-- 只有 manager 和 admin 可以編輯 -->
                                <td>
                                    <a href="{{ route('WaterSupplyStatistic.edit', $statistic->id) }}" class="btn btn-warning">編輯</a>
                                </td>
                            @endif

                                
                        <!-- 刪除按鈕 -->
                        @can('admin') <!-- 只有 admin 可以刪除 -->
                        <td>
                            <form action="{{ route('WaterSupplyStatistic.destroy', $statistic->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">刪除</button>
                            </form>
                        </td>
                        @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">沒有資料可顯示</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            



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
               