@if ($errors->any())
    <ul class="alert alert-danger">
        <h3>錯誤訊息</h3>  <!-- 錯誤訊息的標題放在外面，不需要放在每個錯誤項目中 -->
        @foreach ($errors->all() as $error)
            <li><mark>{{ $error }}</mark></li>
        @endforeach
    </ul>
@endif
