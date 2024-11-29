@extends('app')

@section('title', 'team06 | 自來水供水普及率')

@section('content')
    <h2><mark><a href="http://127.0.0.1:8000/sdgs">什麼是SDGS?</a></mark></h2>
    <h1 class="page-title">自來水供水普及率</h1>
    <h2>以下是隨機生成資料:</h2>
    <table>
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
    <h1><mark>自來水供水普及率與SDGS</mark></h1>
    <h2>自來水供水普及率是實現 SDG 6（清潔飲水和衛生設施） 的關鍵，因為它直接影響安全飲用水的可得性、衛生條件和健康水平。</h2>
@endsection

    