<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class water_supply_statisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    
     public function run(){
        $executingUnits = [
            '台灣自來水股份有限公司(含高雄市)' => [
                'population_range' => [17000000, 19514077], // 行政區域人數範圍
                'percentage_range' => [90.0, 94.9], // 供水普及率範圍
            ],
            '第一區管理處' => [
                'population_range' => [876188, 922903], // 管轄區域人口
                'percentage_range' => [92.15, 93.9],
            ],
            '第二區管理處' => [
                'population_range' => [2022804, 2437255],
                'percentage_range' => [93.71, 97.8],
            ],
            '第三區管理處' => [
                'population_range' => [1362672, 1565067],
                'percentage_range' => [81.93, 92.1],
            ],
            '第四區管理處' => [
                'population_range' => [3167229, 3338275],
                'percentage_range' => [88.79, 94.4],
            ],
            '第五區管理處' => [
                'population_range' => [1407612, 1554695], // 修正人口範圍
                'percentage_range' => [92.99, 95.17],
            ],
            '第六區管理處' => [
                'population_range' => [1862440, 1866307],
                'percentage_range' => [98.62, 99.0],
            ],
            '第七區管理處' => [
                'population_range' => [2843186, 3743627], // 修正人口範圍
                'percentage_range' => [82.85, 96.77],
            ],
            '第八區管理處' => [
                'population_range' => [449890, 460426],
                'percentage_range' => [91.15, 95.85],
            ],
            '第九區管理處' => [
                'population_range' => [317489, 344087],
                'percentage_range' => [82.55, 90.14],
            ],
            '第十區管理處' => [
                'population_range' => [211544, 235957],
                'percentage_range' => [77.62, 85.91],
            ],
            '第十一區管理處' => [
                'population_range' => [1239048, 1288658],
                'percentage_range' => [93.49, 95.27],
            ],
            '第十二區管理處' => [
                'population_range' => [1990195, 2124371],
                'percentage_range' => [98.86, 99.23],
            ],
            '臺北自來水事業處' => [
                'population_range' => [3748177, 3856621],
                'percentage_range' => [99.51, 99.6],
            ],
            '金門自來水廠' => [
                'population_range' => [76491, 144149],
                'percentage_range' => [94.46, 94.55],
            ],
            '連江縣自來水廠' => [
                'population_range' => [9814, 14039],
                'percentage_range' => [86.72, 94.41], // 修正百分比範圍
            ],
        ];

  
        $startDate = Carbon::parse('2006-12-31T00:00:00');
        $endDate = Carbon::parse('2023-12-31T00:00:00');
        $interval = 6; // 每六個月更新一次
        $groupSize = 16; // 每組資料包含16筆
        $currentDate = clone $startDate; // 使用副本避免修改原始 $startDate
        
        // 定義機構池
        $unitsPool = array_keys($executingUnits);
        
 

while ($currentDate <= $endDate) {
    $selectedUnits = [];
    
    // 隨機選擇16個機構，確保不會有重複機構
    while (count($selectedUnits) < $groupSize) {
        $randomUnit = $unitsPool[array_rand($unitsPool)];
        if (!in_array($randomUnit, $selectedUnits)) {
            $selectedUnits[] = $randomUnit;
        }
    }

        foreach ($selectedUnits  as $unitKey ) {
              
                $unit = $executingUnits[$unitKey];
           
                $populationInServedArea = rand($unit['population_range'][0], $unit['population_range'][1]);
                $percentageOfPopulationServed = mt_rand($unit['percentage_range'][0] * 100, $unit['percentage_range'][1] * 100) / 100;
                $actualPopulationServed = round($populationInServedArea * ($percentageOfPopulationServed / 100));

                if ($actualPopulationServed > 2147483647) {
                    $actualPopulationServed = 2147483647;  
                }
                // 供水普及率計算
                $percentageOfPopulationServed = ($actualPopulationServed / $populationInServedArea) * 100;

                // 備註隨機生成
                $remarks = "無";

                // 每個月的間隔
                $dateTime = $currentDate->toDateTimeString();
                
                // 插入資料到資料庫
                DB::table('water_supply_statistics')->insert([
                    'ActualPopulationServed' => $actualPopulationServed,
                    'DateTime' => $dateTime,
                  'ExecutingUnit' => $unitKey, 
                    'PercentageOfPopulationServed' => round($percentageOfPopulationServed, 2), // 保留2位小數
                    'PopulationInServedArea' => $populationInServedArea,
                    'Remarks' => $remarks,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            $currentDate->addMonths($interval);
        }
    }
     /**
     * Generate a random string of specified length
     *
     * @param int $length
     * @return string
     */
    private function generateRandomString($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
    
/*
          在這裡插入數據
          DB::table('water_supply_statistics')->insert([
            ['ActualPopulationServed' => '17082199', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.3, 'PopulationInServedArea' => 18917224, 'Remarks' => '無'],
            ['ActualPopulationServed' => '72218', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.41, 'PopulationInServedArea' => 76491, 'Remarks' => '無'],
            ['ActualPopulationServed' => '807377', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.15, 'PopulationInServedArea' => 876188, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3103386', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 82.85, 'PopulationInServedArea' => 3745929, 'Remarks' => '無'],
            ['ActualPopulationServed' => '285044', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.55, 'PopulationInServedArea' => 345303, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1895661', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 93.71, 'PopulationInServedArea' => 2022804, 'Remarks' => '無'],
            ['ActualPopulationServed' => '419683', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.15, 'PopulationInServedArea' => 460426, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1205558', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.49, 'PopulationInServedArea' => 1289519, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1967453', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.86, 'PopulationInServedArea' => 1990195, 'Remarks' => '無'],
            ['ActualPopulationServed' => '183139', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 77.62, 'PopulationInServedArea' => 235957, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1116385', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 81.93, 'PopulationInServedArea' => 1362672, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1445732', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 92.99, 'PopulationInServedArea' => 1554695, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1840594', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.62, 'PopulationInServedArea' => 1866307, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2812187', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 88.79, 'PopulationInServedArea' => 3167229, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9468', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 96.75, 'PopulationInServedArea' => 9786, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3853890', 'DateTime' => '2006-12-31 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3873026, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17136552', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.46, 'PopulationInServedArea' => 18944546, 'Remarks' => '無'],
            ['ActualPopulationServed' => '74648', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.46, 'PopulationInServedArea' => 79023, 'Remarks' => '無'],
            ['ActualPopulationServed' => '809050', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.23, 'PopulationInServedArea' => 877164, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3105842', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 82.96, 'PopulationInServedArea' => 3743627, 'Remarks' => '無'],
            ['ActualPopulationServed' => '284519', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.69, 'PopulationInServedArea' => 344087, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1917718', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 94.21, 'PopulationInServedArea' => 2035661, 'Remarks' => '無'],
            ['ActualPopulationServed' => '419589', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.19, 'PopulationInServedArea' => 460133, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1206053', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.59, 'PopulationInServedArea' => 1288658, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1976318', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.86, 'PopulationInServedArea' => 1999042, 'Remarks' => '無'],
            ['ActualPopulationServed' => '183477', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 78.18, 'PopulationInServedArea' => 234672, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1125426', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 82.25, 'PopulationInServedArea' => 1368237, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1441997', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 92.94, 'PopulationInServedArea' => 1551579, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1843123', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.69, 'PopulationInServedArea' => 1867601, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2823440', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 88.95, 'PopulationInServedArea' => 3174085, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9490', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 96.7, 'PopulationInServedArea' => 9814, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3849378', 'DateTime' => '2007-06-30 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3868514, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17191993', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.51, 'PopulationInServedArea' => 18994905, 'Remarks' => '無'],
            ['ActualPopulationServed' => '77059', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.5, 'PopulationInServedArea' => 81547, 'Remarks' => '無'],
            ['ActualPopulationServed' => '812543', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.24, 'PopulationInServedArea' => 880869, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3101501', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 82.77, 'PopulationInServedArea' => 3747249, 'Remarks' => '無'],
            ['ActualPopulationServed' => '283872', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.69, 'PopulationInServedArea' => 343302, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1937035', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 94.33, 'PopulationInServedArea' => 2053438, 'Remarks' => '無'],
            ['ActualPopulationServed' => '420456', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.32, 'PopulationInServedArea' => 460398, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1209608', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.84, 'PopulationInServedArea' => 1289014, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1986556', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.87, 'PopulationInServedArea' => 2009211, 'Remarks' => '無'],
            ['ActualPopulationServed' => '182030', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 77.9, 'PopulationInServedArea' => 233660, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1134683', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 82.6, 'PopulationInServedArea' => 1373652, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1440557', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 92.93, 'PopulationInServedArea' => 1550092, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1845194', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.69, 'PopulationInServedArea' => 1869633, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2837958', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 89.12, 'PopulationInServedArea' => 3184387, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9735', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 97.88, 'PopulationInServedArea' => 9946, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3852826', 'DateTime' => '2007-12-31 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3871962, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17252353', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.67, 'PopulationInServedArea' => 19028470, 'Remarks' => '無'],
            ['ActualPopulationServed' => '78654', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.51, 'PopulationInServedArea' => 83225, 'Remarks' => '無'],
            ['ActualPopulationServed' => '814236', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.36, 'PopulationInServedArea' => 881590, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3115344', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 83.16, 'PopulationInServedArea' => 3746141, 'Remarks' => '無'],
            ['ActualPopulationServed' => '283647', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.81, 'PopulationInServedArea' => 342516, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1952216', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 94.44, 'PopulationInServedArea' => 2067195, 'Remarks' => '無'],
            ['ActualPopulationServed' => '421757', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.47, 'PopulationInServedArea' => 461082, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1208785', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.86, 'PopulationInServedArea' => 1287901, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1995589', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.89, 'PopulationInServedArea' => 2017954, 'Remarks' => '無'],
            ['ActualPopulationServed' => '182162', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 78.29, 'PopulationInServedArea' => 232663, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1145639', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 83.01, 'PopulationInServedArea' => 1380103, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1439633', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 92.98, 'PopulationInServedArea' => 1548291, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1846868', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.7, 'PopulationInServedArea' => 1871099, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2846477', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 89.18, 'PopulationInServedArea' => 3191935, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9788', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 98.46, 'PopulationInServedArea' => 9941, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3853726', 'DateTime' => '2008-06-30 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3872626, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17300119', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.7, 'PopulationInServedArea' => 19073097, 'Remarks' => '無'],
            ['ActualPopulationServed' => '79907', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.49, 'PopulationInServedArea' => 84570, 'Remarks' => '無'],
            ['ActualPopulationServed' => '817839', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.36, 'PopulationInServedArea' => 885468, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3119828', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 83.25, 'PopulationInServedArea' => 3747646, 'Remarks' => '無'],
            ['ActualPopulationServed' => '283134', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.93, 'PopulationInServedArea' => 341433, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1965359', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 94.33, 'PopulationInServedArea' => 2083536, 'Remarks' => '無'],
            ['ActualPopulationServed' => '422200', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.6, 'PopulationInServedArea' => 460902, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1208545', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.84, 'PopulationInServedArea' => 1287845, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2006815', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.9, 'PopulationInServedArea' => 2029082, 'Remarks' => '無'],
            ['ActualPopulationServed' => '181724', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 78.38, 'PopulationInServedArea' => 231849, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1154108', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 83.19, 'PopulationInServedArea' => 1387273, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1438009', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 93, 'PopulationInServedArea' => 1546198, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1848565', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.72, 'PopulationInServedArea' => 1872559, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2853993', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 89.21, 'PopulationInServedArea' => 3199306, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9636', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 98.78, 'PopulationInServedArea' => 9755, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3850709', 'DateTime' => '2008-12-31 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3869609, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17328164', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.7, 'PopulationInServedArea' => 19105051, 'Remarks' => '無'],
            ['ActualPopulationServed' => '84548', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.5, 'PopulationInServedArea' => 89471, 'Remarks' => '無'],
            ['ActualPopulationServed' => '820490', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.36, 'PopulationInServedArea' => 888341, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3120536', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第七區管理處', 'PercentageOfPopulationServed' => 83.27, 'PopulationInServedArea' => 3747501, 'Remarks' => '無'],
            ['ActualPopulationServed' => '282850', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第九區管理處', 'PercentageOfPopulationServed' => 82.97, 'PopulationInServedArea' => 340903, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1968956', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第二區管理處', 'PercentageOfPopulationServed' => 94.01, 'PopulationInServedArea' => 2094458, 'Remarks' => '無'],
            ['ActualPopulationServed' => '424465', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第八區管理處', 'PercentageOfPopulationServed' => 91.98, 'PopulationInServedArea' => 461461, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1206002', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第十一區管理處', 'PercentageOfPopulationServed' => 93.69, 'PopulationInServedArea' => 1287169, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2015229', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第十二區管理處', 'PercentageOfPopulationServed' => 98.91, 'PopulationInServedArea' => 2037378, 'Remarks' => '無'],
            ['ActualPopulationServed' => '181911', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第十區管理處', 'PercentageOfPopulationServed' => 78.39, 'PopulationInServedArea' => 232071, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1162420', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第三區管理處', 'PercentageOfPopulationServed' => 83.4, 'PopulationInServedArea' => 1393738, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1436984', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第五區管理處', 'PercentageOfPopulationServed' => 93.02, 'PopulationInServedArea' => 1544786, 'Remarks' => '無'],
            ['ActualPopulationServed' => '1849502', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第六區管理處', 'PercentageOfPopulationServed' => 98.73, 'PopulationInServedArea' => 1873213, 'Remarks' => '無'],
            ['ActualPopulationServed' => '2858819', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '第四區管理處', 'PercentageOfPopulationServed' => 89.23, 'PopulationInServedArea' => 3204032, 'Remarks' => '無'],
            ['ActualPopulationServed' => '9669', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '連江縣自來水廠', 'PercentageOfPopulationServed' => 98.68, 'PopulationInServedArea' => 9798, 'Remarks' => '無'],
            ['ActualPopulationServed' => '3846125', 'DateTime' => '2009-06-30 00:00:00', 'ExecutingUnit' => '臺北自來水事業處', 'PercentageOfPopulationServed' => 99.51, 'PopulationInServedArea' => 3865025, 'Remarks' => '無'],
            ['ActualPopulationServed' => '17377812', 'DateTime' => '2009-12-31 00:00:00', 'ExecutingUnit' => '台灣自來水股份有限公司(含高雄市)', 'PercentageOfPopulationServed' => 90.72, 'PopulationInServedArea' => 19155092, 'Remarks' => '無'],
            ['ActualPopulationServed' => '88632', 'DateTime' => '2009-12-31 00:00:00', 'ExecutingUnit' => '金門縣自來水廠', 'PercentageOfPopulationServed' => 94.49, 'PopulationInServedArea' => 93803, 'Remarks' => '無'],
            ['ActualPopulationServed' => '826691', 'DateTime' => '2009-12-31 00:00:00', 'ExecutingUnit' => '第一區管理處', 'PercentageOfPopulationServed' => 92.49, 'PopulationInServedArea' => 893828, 'Remarks' => '無'],
//100
        ]);*/
    

