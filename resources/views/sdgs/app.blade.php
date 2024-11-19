<!-- resources/views/sdgs/app.blade.php -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta property="og:image" content="http://globalgoals.tw/share.png">
    <meta property="og:image:width" content="1160">
    <meta property="og:image:height" content="1160">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title', '可持續發展目標（SDGs）介紹')</title> <!-- 頁面標題 -->
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
        <h1>@yield('page_title', '可持續發展目標')</h1> <!-- 頁面標題 -->
    </header>

    <div class="container">
        @yield('content') <!-- 這裡插入具體頁面的內容 -->
    </div>

    <footer>
        <p>© 2024 可持續發展目標介紹網站: <a href="https://sdgs.un.org/goals" target="_blank">聯合國 SDGs 官方網站</a></p>
    </footer>
</body>
</html>
