@extends('app') 
@section('title', 'team06 | 自來水供水普及率')
@section('content')


    <h2><mark><a href="http://127.0.0.1:8000/sdgs">什麼是SDGS?</a></mark></h2>
    <h2><mark><a href="http://127.0.0.1:8000/home">返回首頁</a></mark></h2>
    <h2>以下是隨機生成資料:</h2>
    <button class="btn btn-primary" onclick="window.location.href='{{ route('populations.create') }}'"><h4>新增自來水供水普及率資料</h4></button>

    
    
      <!-- Search Form -->
      <h3>執行單位或完整日期時間(自動搜尋):</h3><input type="text" id="searchInput" placeholder="輸入執行單位或日期時間" onkeyup="filterData()" class="form-control mb-3">
      <table id="populationTable">
        <thead>
            <tr>
                <th>編號</th>
                <th>實際供水人口</th>
                <th>日期時間</th>
                <th>執行單位</th>
                <th>供水人口比例</th>
                <th>供水區域人口</th>
                <th>備註</th>
                <th>操作1</th>
                <th>操作2</th>
                <th>操作3</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($populations as $population)
                <tr>
                    <td>{{ $population->id }}</td>
                    <td>{{ $population->actual_population_served }}</td>
                    <td>{{ $population->date_time }}</td>
                    <td>{{ $population->executing_unit }}</td>
                    <td>{{ $population->percentage_of_population_served }}</td>
                    <td>{{ $population->population_in_served_area }}</td>
                    <td>{{ $population->remarks }}</td>
                    <td><a href="{{ route('populations.show', ['id' => $population->id]) }}">顯示</a></td>
                    <td><a href="{{ route('populations.edit', ['id' => $population->id]) }}">編輯</a></td>
                    <td>
                        <form action="{{ url('/populations/delete', ['id' => $population->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="刪除" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script>   //執行輸入單位或完整日期時間(自動搜尋)
        function filterData() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toLowerCase();
            let table = document.getElementById('populationTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let tds = tr[i].getElementsByTagName('td');
                let rowText = '';
                for (let j = 0; j < tds.length; j++) {
                    rowText += tds[j].textContent || tds[j].innerText;
                }
                
                // If the row contains the search term, display it
                if (rowText.toLowerCase().includes(filter)) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
    </script>


@endsection

    