<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>可持續發展目標（SDGs）介紹</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef2f3;
        }
        header {
            background: #025510;
            color: white;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .goal {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
             transition: background-color 0.3s, transform 0.2s; /* 加入 transform 的過渡 */
}
        .goal:hover {
            background-color: #f1f1f1;
            transform: scale(1.05);
            z-index: 1;
        }
        .goal-number {
            font-size: 30px;
            font-weight: bold;
            color: #025510;
            margin-right: 15px;
        }

        .goal h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .goal p {
            margin: 5px 0 0;
        }
        ul {
            list-style-type: square;
            padding-left: 20px;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #555;
        }
        .goal img {
           /* width: auto; /* 調整為更大的寬度 */
           /* height: 100px; /* 自動調整高度 */
          /* margin-right: 10px;
          /*  transition: transform 0.2s;*/
        }
        .goal img:hover {
            /*transform: scale(1.1);*/
        }
    </style>
</head>
<body>

<header>
    <h1>可持續發展目標（SDGs）</h1>
    <p>一個為全人類的未來而努力的藍圖</p>
</header>

<div class="container">
    <h2>什麼是SDGs？</h2>

    <p>聯合國於西元 2015 年通過 2030 永續發展議程，提出 17 項全球邁向永續發展的核心目標，藉此引領政府、地方政府、企業、公民團體等行動者，在未來 15 年間的決策、投資與行動方向，共同創建「每個國家都實現持久、包容和永續的經濟增長和每個人都有合宜工作」的世界。</p>

    <h2>SDGs的17項永續發展目標</h2>

    <?php
    $goals = [
        ["title" => "消除貧窮", "description" => "在全球範圍內消除一切形式的貧窮。", "icon" => "fa-dollar-sign", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-01.jpg"],
        ["title" => "消除饑餓", "description" => "終結饑餓，實現糧食安全和改善營養。", "icon" => "fa-utensils", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-02.jpg"],
        ["title" => "良好健康與福祉", "description" => "確保健康生活，促進各年齡段人群的福祉。", "icon" => "fa-heartbeat", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-03.jpg"],
        ["title" => "優質教育", "description" => "確保包容和公平的優質教育，促進終身學習機會。", "icon" => "fa-book", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-04.jpg"],
        ["title" => "性別平等", "description" => "實現性別平等，增強所有婦女和女童的權能。", "icon" => "fa-venus", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg"],
        ["title" => "清潔飲水和衛生設施", "description" => "確保人人享有水和衛生設施的可持續管理。", "icon" => "fa-tint", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-06.jpg"],
        ["title" => "可負擔的清潔能源", "description" => "確保人人能獲得可負擔的可靠的可持續能源。", "icon" => "fa-bolt", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-07.jpg"],
        ["title" => "體面工作和經濟增長", "description" => "促進持久、包容和可持續的經濟增長，實現充分和富有成效的就業。", "icon" => "fa-briefcase", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-08.jpg"],
        ["title" => "產業、創新和基礎設施", "description" => "建設韌性基礎設施，促進可持續工業化和鼓勵創新。", "icon" => "fa-industry", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-09.jpg"],
        ["title" => "減少不平等", "description" => "在國家和國家之間縮小不平等。", "icon" => "fa-equals", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-10.jpg"],
        ["title" => "可持續城市和社區", "description" => "建設包容、安全、有韌性的可持續城市和人類住區。", "icon" => "fa-building", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-11.jpg"],
        ["title" => "負責任消費和生產", "description" => "確保可持續的消費和生產模式。", "icon" => "fa-recycle", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-12.jpg"],
        ["title" => "氣候行動", "description" => "採取緊急行動應對氣候變化及其影響。", "icon" => "fa-thermometer-half", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-13.jpg"],
        ["title" => "水下生態", "description" => "保護和可持續利用海洋和海洋資源。", "icon" => "fa-water", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-14.jpg"],
        ["title" => "陸地生態", "description" => "保護、恢復和促進陸地生態系統的可持續管理。", "icon" => "fa-tree", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-15.jpg"],
        ["title" => "和平與公正", "description" => "促進包容的社會，實現可持續發展。", "icon" => "fa-dove", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-16.jpg"],
        ["title" => "夥伴關係", "description" => "加強實現可持續發展的執行手段，振興全球夥伴關係。", "icon" => "fa-hands-helping", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-17.jpg"],
];

    foreach ($goals as $index => $goal) {
        echo '<div class="goal">';
        echo '<div class="goal-number">' . ($index + 1) . '.</div>';        
        echo '<img src="' . $goal['image'] . '" alt="' . $goal['title'] . '" style="width: auto; height: 100px; margin-right: 15px;">';
        echo '<div>';
        echo '<h3>' . $goal['title'] . '</h3>';
        echo '<p>' . $goal['description'] . '</p>';
        echo '<div class="goal-description">' . $goal['description'] . '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>

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

</div>

<footer>
    <p>© 2024 可持續發展目標介紹網站</p>
</footer>

</body>
</html>
