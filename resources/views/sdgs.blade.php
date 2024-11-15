<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta property="og:image" content="http://globalgoals.tw/share.png">
    <meta property="og:image:width" content="1160">
    <meta property="og:image:heigth" content="1160">
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
            background-image: url('https://media.human-dc.com/cms/wp-content/uploads/2021/09/SDGs.jpg'); /* 使用提供的圖片 URL */
            background-size: cover;
            background-position: center center;
            color: rgb(12, 7, 7);
            padding: 20px;
            text-align: center;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 4px 4px 4px rgba(245, 243, 243, 0.5); /* 增加文字陰影 */
        }
        h1 {
            margin: 0;
            font-size: 3em;
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
            transition: background-color 0.3s, transform 0.2s;
        }

        .goal:hover {
           background-color: #f1f1f1;
           border: 1px solid #ccc;
           box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
           transform: scale(1.03);
        }
        .goal-number {
           font-size: 30px;
           font-weight: bold;
           color: #025510;
           margin-right: 15px;
        }
        .goal img {
           width: 100px; /* 設置圖像最大寬度 */
           height: auto;
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
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 0.9em;
            color: #333;
              }
        footer a {
            color: #007bff;
            text-decoration: none;
            }
        footer a:hover {
             text-decoration: underline;
         }
         .homepage-link {
        text-decoration: none; /* 移除底線 */
    }
    @media (max-width: 600px) {
    .goal {
        flex-direction: column; /* 在小螢幕上讓目標區塊垂直排列 */
        align-items: flex-start; /* 讓項目靠左排列 */
    }

    .goal img {
        width: 80px; /* 調整圖像寬度，讓它適應小螢幕 */
        margin-bottom: 10px; /* 增加圖片與文字之間的間距 */
    }

    .goal-number {
        font-size: 24px; /* 在小螢幕上減小目標號碼的字體 */
        margin-right: 10px;
    }

    .goal h3 {
        font-size: 1em; /* 在小螢幕上縮小標題字體 */
    }
}

    </style>
</head>


<body>
   

<header>
    <h1>可持續發展目標</h1>
</header>
<p>自來水供水普及率<a href="http://127.0.0.1:8000/water" target="_blank">查詢</a></p>
<div class="container">
 
    <h2>什麼是SDGs？</h2>

    <p>聯合國於西元 2015 年通過 2030 永續發展議程，提出 17 項全球邁向永續發展的核心目標，藉此引領政府、地方政府、企業、公民團體等行動者，在未來 15 年間的決策、投資與行動方向，共同創建「每個國家都實現持久、包容和永續的經濟增長和每個人都有合宜工作」的世界。</p>

    <h2>SDGs的17項永續發展目標</h2>

    <?php
    $goals = [
        ["title" => "消除貧窮", "description" => "在全球範圍內消除一切形式的貧窮。", "icon" => "fa-dollar-sign", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-01.jpg", "link" => "https://globalgoals.tw/1-no-poverty"],
        ["title" => "終結飢餓", "description" => "終結饑餓，實現糧食安全和改善營養。", "icon" => "fa-utensils", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-02.jpg", "link" => "https://globalgoals.tw/2-zero-hunger"],
        ["title" => "健康與福祉", "description" => "確保健康生活，促進各年齡段人群的福祉。", "icon" => "fa-heartbeat", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-03.jpg", "link" => "https://globalgoals.tw/3-good-health-and-well-being"],
        ["title" => "優質教育", "description" => "確保包容和公平的優質教育，促進終身學習機會。", "icon" => "fa-book", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-04.jpg", "link" => "https://globalgoals.tw/4-quality-education"],
        ["title" => "性別平等", "description" => "實現性別平等，增強所有婦女和女童的權能。", "icon" => "fa-venus", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-05.jpg", "link" => "https://globalgoals.tw/5-gender-equality"],
        ["title" => "淨水和衛生", "description" => "確保人人享有水和衛生設施的可持續管理。", "icon" => "fa-tint", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-06.jpg", "link" => "https://globalgoals.tw/6-clean-water-and-sanitation"],
        ["title" => "可負擔的永續能源", "description" => "確保人人能獲得可負擔的可靠的可持續能源。", "icon" => "fa-bolt", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-07.jpg", "link" => "https://globalgoals.tw/7-affordable-and-clean-energy"],
        ["title" => "就業與經濟成長", "description" => "促進持久、包容和可持續的經濟增長，實現充分和富有成效的就業。", "icon" => "fa-briefcase", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-08.jpg", "link" => "https://globalgoals.tw/8-decent-work-and-economic-growth"],
        ["title" => "永續工業和基礎設施", "description" => "建設韌性基礎設施，促進可持續工業化和鼓勵創新。", "icon" => "fa-industry", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-09.jpg", "link" => "https://globalgoals.tw/9-industry-innovation-and-infrastructure"],
        ["title" => "減少不平等", "description" => "在國家和國家之間縮小不平等。", "icon" => "fa-equals", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-10.jpg", "link" => "https://globalgoals.tw/10-reduced-inequalities"],
        ["title" => "永續城鄉", "description" => "建設包容、安全、有韌性的可持續城市和人類住區。", "icon" => "fa-building", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-11.jpg", "link" => "https://globalgoals.tw/11-sustainable-cities-and-communities"],
        ["title" => "責任消費和生產", "description" => "確保可持續的消費和生產模式。", "icon" => "fa-recycle", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-12.jpg", "link" => "https://globalgoals.tw/12-responsible-consumption-and-production"],
        ["title" => "氣候行動", "description" => "採取緊急行動應對氣候變化及其影響。", "icon" => "fa-thermometer-half", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-13.jpg", "link" => "https://globalgoals.tw/13-climate-action"],
        ["title" => "永續海洋與保育", "description" => "保護和可持續利用海洋和海洋資源。", "icon" => "fa-water", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-14.jpg", "link" => "https://globalgoals.tw/14-life-below-water"],
        ["title" => "陸域生態", "description" => "保護、恢復和促進陸地生態系統的可持續管理。", "icon" => "fa-tree", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-15.jpg", "link" => "https://globalgoals.tw/15-life-on-land"],
        ["title" => "和平與公正", "description" => "促進包容的社會，實現可持續發展。", "icon" => "fa-dove", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-16.jpg", "link" => "https://globalgoals.tw/16-peace-and-justice"],
        ["title" => "永續發展夥伴關係", "description" => "加強實現可持續發展的執行手段，振興全球夥伴關係。", "icon" => "fa-hands-helping", "image" => "https://sdgs.un.org/sites/default/files/goals/E_SDG_Icons-17.jpg", "link" => "https://globalgoals.tw/17-partnerships-for-the-goals"]
    ];
    
    foreach ($goals as $index => $goal) {
    echo '<div class="goal">';
    // 包裹整個目標區塊在 <a> 標籤中，並且設置 target="_blank" 讓鏈接在新窗口打開
    echo '<a href="' . $goal['link'] . '" target="_blank" style="display: flex; text-decoration: none; color: inherit; align-items: center;">'; 
    echo '<div class="goal-number">' . ($index + 1) . '.</div>';
    echo '<img src="' . $goal['image'] . '" alt="' . $goal['title'] . '" style="width: 100px; height: auto; margin-right: 15px;">';
    echo '<div>';
    echo '<h3>' . $goal['title'] . '</h3>';
    echo '<p>' . $goal['description'] . '</p>';
    echo '</div>';
    echo '</a>';  // 結束 <a> 標籤
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
    <p>© 2024 可持續發展目標介紹網站:<a href="https://sdgs.un.org/goals" target="_blank">聯合國 SDGs 官方網站</a></p>
</footer>

</body>
</html>
