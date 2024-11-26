<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WaterServicePopulationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            '台灣自來水股份有限公司(含高雄市)',
            '金門縣自來水廠',
            '第一區管理處',
            '第七區管理處',
            '第九區管理處',
            '第二區管理處',
            '第八區管理處',
            '第十一區管理處',
            '第十二區管理處',
            '第十區管理處',
            '第三區管理處',
            '第五區管理處',
            '第六區管理處',
            '第四區管理處',
            '連江縣自來水廠',
            '臺北自來水事業處',
        ];

        $numberOfRecords = 60;

        for ($i = 0; $i < $numberOfRecords; $i++) {
            $populationInServedArea = rand(10000, 5000000); // 隨機生成服務區域人口
            $populationServed = rand(8000, $populationInServedArea); // 確保實際服務人口不會超過服務區域人口
            $percentageOfpopulationServed = min(round(($populationServed / $populationInServedArea) * 100, 2), 100);
            
           
        DB::table('water_service_populations')->insert([
        [
            'actual_population_served' => $populationServed, // 加入實際服務人口
            'date_time' => Carbon::now()->subYears(rand(1, 20))->format('Y-m-d H:i:s'), // 隨機生成日期
            'executing_unit' => $units[rand(0, count($units) - 1)],
            'percentage_of_population_served' => $percentageOfpopulationServed,
            'population_in_served_area' => $populationInServedArea,
            'remarks' => '無',
            'created_at' => now(),
            'updated_at'=> now(),

            

        ]
        ]);
    }
        
    }
}

