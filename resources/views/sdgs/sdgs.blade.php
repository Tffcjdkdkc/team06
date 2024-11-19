<!-- resources/views/sdgs/sdgs.blade.php -->
@extends('sdgs.app') <!-- 擴展自 sdgs/app.blade.php 這個佈局 -->

@section('page_title', '可持續發展目標介紹') <!-- 頁面標題 -->

@section('content')
    <p>自來水供水普及率 <a href="http://127.0.0.1:8000/water" target="_blank">查詢</a></p>

    <h2>什麼是SDGs？</h2>
    <p>聯合國於西元 2015 年通過 2030 永續發展議程，提出 17 項全球邁向永續發展的核心目標，藉此引領政府、地方政府、企業、公民團體等行動者，在未來 15 年間的決策、投資與行動方向，共同創建「每個國家都實現持久、包容和永續的經濟增長和每個人都有合宜工作」的世界。</p>

    <h2>SDGs的17項永續發展目標</h2>

    @foreach ($goals as $index => $goal)
        <div class="goal">
            <a href="{{ $goal['link'] }}" target="_blank" style="display: flex; text-decoration: none; color: inherit; align-items: center;">
                <div class="goal-number">{{ $index + 1 }}.</div>
                <img src="{{ $goal['image'] }}" alt="{{ $goal['title'] }}" style="width: 100px; height: auto; margin-right: 15px;">
                <div>
                    <h3>{{ $goal['title'] }}</h3>
                    <p>{{ $goal['description'] }}</p>
                </div>
            </a>
        </div>
    @endforeach

    <h2>為什麼SDGs重要？</h2>
    <p>可持續發展目標為全球社會提供了一個共同的藍圖，鼓勵各國、企業、社會組織和個人攜手合作，應對當前面臨的全球挑戰，如貧困、氣候變化和不平等。</p>

    <h2>如何參與？</h2>
    <ul>
        <li>提高意識：學習和分享SDGs的知識。</li>
        <li>行動起來：在日常生活中實踐可持續行為。</li>
        <li>支持政策：支持政府和企業在可持續發展方面的努力。</li>
        <li>加入社區活動：參與本地的可持續發展項目和活動。</li>
    </ul>

    <h2>結論</h2>
    <p>可持續發展目標是一項全球倡議，旨在確保未來世代的幸福與繁榮。每個人都可以在實現這些目標中發揮重要作用。</p>
@endsection
