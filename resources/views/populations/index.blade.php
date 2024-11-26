<html>
    <head>
        <title>自來水供水普及率</title>
        <style>  
            body {
                background-color: #d1e8e4; /* 淡藍色 */
                font-family: Arial, sans-serif;
            }
            h1.page-title {
            background-color: #ff6600; /* 設定你想要的顏色，例如橙色 */
            text-align: center;
            font-size: 28px;
            margin-top: 20px;
            }
            h2  {
            text-align: center;
            color: rgb(245, 2, 237);
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 8px;
                text-align: center;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f4f4f4;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            footer {
            background-color: #007bff;
            text-align: center;
            margin-top: 20px;
            color: #5bfa06;
        }
         /* 圖片樣式 */
        img.centered {
                display: block;
                margin: 0 auto;
                width: 50%; /* 調整寬度 */
                height: auto; /* 等比例縮放 */
            }
        </style>
    </head>
    <body>
        <!-- 圖片部分 -->
        <img src="http://localhost/team06/image/sdgs06_longer.png" class="centered" alt="SDG 06 Image">
        <h2><mark><a href="http://127.0.0.1:8000/sdgs">什麼是SDGS?</a></mark></h2>
        <h1 class="page-title">自來水供水普及率</h1>
        <h2>以下是隨機生成資料:</h2>



        
        

        
        
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>實際供水人口</th>
                        <th>日期時間</th>
                        <th>執行單位</th>
                        <th>供水人口比例</th>
                        <th>供水區域人口</th>
                        <th>備註</th>
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
                        </tr>
                    
                        
                           
                        @endforeach     
                    </tbody>
                </table>
                <h1><mark>自來水供水普及率與SDGS</mark></h1>
                <h2>自來水供水普及率是實現 SDG 6（清潔飲水和衛生設施） 的關鍵，因為它直接影響安全飲用水的可得性、衛生條件和健康水平。提高供水普及率能減少水傳疾病、促進基礎設施建設，並縮小城鄉和貧富差距，同時支持水資源的可持續管理，與其他可持續發展目標（如健康、城市建設和氣候行動）相輔相成。</h2>
                <footer>
                    <p>參考網址:<a href="https://www.water.gov.tw/ch/Contents?nodeId=1304" target="_blank"><mark>自來水公司網站<mark></a></p>
                    <p>參考網址:<a href="https://sdgs.un.org/zh/goals/goal6" target="_blank"><mark>聯合國 SDG06 官方網站<mark></a></p>
                    <p>參考網址:<a href="https://data.gov.tw/dataset/8989" target="_blank"><mark>自來水供水普及率<mark></a></p>
                </footer>
                <footer>
                    <h1>珍惜水資源|節約用水</h1>
                    <p>&copy; team06 sdg06</p>
                </footer>
           
            
        </body>
    </html>
    