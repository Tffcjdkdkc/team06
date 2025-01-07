@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h1>錯誤訊息</h1>
            <li><mark>{{ $error }}</mark></li>
        @endforeach
    </ul>
@endif