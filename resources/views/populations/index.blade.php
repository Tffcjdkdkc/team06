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
        </style>
    </head>
    <body>
        <h1 class="page-title"><a href="https://data.gov.tw/dataset/8989">自來水供水普及率<a></h1>
        <h2>以下是隨機生成資料:</h2>

        


        

        
        </form>

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
                            
                           
                    @endforeach     
                </tbody>
            </table>
            <footer>
                <p>參考網址:<a href="https://www.water.gov.tw/ch/Contents?nodeId=1304" target="_blank"><mark>自來水公司網站<mark></a></p>
                <p>參考網址:<a href="https://sdgs.un.org/zh/goals/goal6" target="_blank"><mark>聯合國 SDG06 官方網站<mark></a></p>
                <p>參考網址:<a href="https://data.gov.tw/dataset/8989" target="_blank"><mark>自來水供水普及率<mark></a></p>
            </footer>
            <footer>
                <h1>珍惜水資源|節約用水 </h1>
                <p>&copy; team06 sdg06</p>
            </footer>
       
        
    </body>
</html>
