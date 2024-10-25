<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class water_supply_statisticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
          /* 在這裡插入數據
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
        
        ]);*/
    }
}
