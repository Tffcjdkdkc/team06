<?php

namespace Database\Seeders;

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
        $data = [
            ['actual_population_served' => 17082199, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '台灣自來水股份有限公司(含高雄市)', 'percentage_of_population_served' => 90.30, 'population_in_served_area' => 18917224, 'remarks' => '無'],
            ['actual_population_served' => 72218, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '金門縣自來水廠', 'percentage_of_population_served' => 94.41, 'population_in_served_area' => 76491, 'remarks' => '無'],
            ['actual_population_served' => 807377, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第一區管理處', 'percentage_of_population_served' => 92.15, 'population_in_served_area' => 876188, 'remarks' => '無'],
            ['actual_population_served' => 3103386, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第七區管理處', 'percentage_of_population_served' => 82.85, 'population_in_served_area' => 3745929, 'remarks' => '無'],
            ['actual_population_served' => 285044, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第九區管理處', 'percentage_of_population_served' => 82.55, 'population_in_served_area' => 345303, 'remarks' => '無'],
            ['actual_population_served' => 1895661, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第二區管理處', 'percentage_of_population_served' => 93.71, 'population_in_served_area' => 2022804, 'remarks' => '無'],
            ['actual_population_served' => 419683, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第八區管理處', 'percentage_of_population_served' => 91.15, 'population_in_served_area' => 460426, 'remarks' => '無'],
            ['actual_population_served' => 1205558, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第十一區管理處', 'percentage_of_population_served' => 93.49, 'population_in_served_area' => 1289519, 'remarks' => '無'],
            ['actual_population_served' => 1967453, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第十二區管理處', 'percentage_of_population_served' => 98.86, 'population_in_served_area' => 1990195, 'remarks' => '無'],
            ['actual_population_served' => 183139, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第十區管理處', 'percentage_of_population_served' => 77.62, 'population_in_served_area' => 235957, 'remarks' => '無'],
            ['actual_population_served' => 1116385, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第三區管理處', 'percentage_of_population_served' => 81.93, 'population_in_served_area' => 1362672, 'remarks' => '無'],
            ['actual_population_served' => 1445732, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第五區管理處', 'percentage_of_population_served' => 92.99, 'population_in_served_area' => 1554695, 'remarks' => '無'],
            ['actual_population_served' => 1840594, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第六區管理處', 'percentage_of_population_served' => 98.62, 'population_in_served_area' => 1866307, 'remarks' => '無'],
            ['actual_population_served' => 2812187, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '第四區管理處', 'percentage_of_population_served' => 88.79, 'population_in_served_area' => 3167229, 'remarks' => '無'],
            ['actual_population_served' => 9468, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '連江縣自來水廠', 'percentage_of_population_served' => 96.75, 'population_in_served_area' => 9786, 'remarks' => '無'],
            ['actual_population_served' => 3853890, 'date_time' => '2006-12-31 00:00:00', 'executing_unit' => '臺北自來水事業處', 'percentage_of_population_served' => 99.51, 'population_in_served_area' => 3873026, 'remarks' => '無'],
        ];

        DB::table('water_service_populations')->insert($data);
    }
}

