<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_supply_statistics', function (Blueprint $table) {
            $table->id(); // 自動生成主鍵欄位
            $table->string('observation_id', 50)->comment('觀察ID');
            $table->dateTime('observation_date')->comment('觀察日期');
            $table->string('facility_name', 100)->comment('設施名稱');
            $table->decimal('water_quality', 5, 2)->comment('水質評分');
            $table->integer('water_supply_amount')->comment('供水量');
            $table->string('notes', 100)->nullable()->comment('備註');
            $table->timestamps(); // 自動生成 created_at 和 updated_at 欄位
        });
        DB::table('water_quality_observations')->insert([
                ['observation_id' => '17082199', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '台灣自來水股份有限公司(含高雄市)', 'water_quality' => 90.3, 'water_supply_amount' => 18917224, 'notes' => '無'],
                ['observation_id' => '72218', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '金門縣自來水廠', 'water_quality' => 94.41, 'water_supply_amount' => 76491, 'notes' => '無'],
                ['observation_id' => '807377', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第一區管理處', 'water_quality' => 92.15, 'water_supply_amount' => 876188, 'notes' => '無'],
                ['observation_id' => '3103386', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第七區管理處', 'water_quality' => 82.85, 'water_supply_amount' => 3745929, 'notes' => '無'],
                ['observation_id' => '285044', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第九區管理處', 'water_quality' => 82.55, 'water_supply_amount' => 345303, 'notes' => '無'],
                ['observation_id' => '1895661', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第二區管理處', 'water_quality' => 93.71, 'water_supply_amount' => 2022804, 'notes' => '無'],
                ['observation_id' => '419683', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第八區管理處', 'water_quality' => 91.15, 'water_supply_amount' => 460426, 'notes' => '無'],
                ['observation_id' => '1205558', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第十一區管理處', 'water_quality' => 93.49, 'water_supply_amount' => 1289519, 'notes' => '無'],
                ['observation_id' => '1967453', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第十二區管理處', 'water_quality' => 98.86, 'water_supply_amount' => 1990195, 'notes' => '無'],
                ['observation_id' => '183139', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第十區管理處', 'water_quality' => 77.62, 'water_supply_amount' => 235957, 'notes' => '無'],
                ['observation_id' => '1116385', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第三區管理處', 'water_quality' => 81.93, 'water_supply_amount' => 1362672, 'notes' => '無'],
                ['observation_id' => '1445732', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第五區管理處', 'water_quality' => 92.99, 'water_supply_amount' => 1554695, 'notes' => '無'],
                ['observation_id' => '1840594', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第六區管理處', 'water_quality' => 98.62, 'water_supply_amount' => 1866307, 'notes' => '無'],
                ['observation_id' => '2812187', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第四區管理處', 'water_quality' => 88.79, 'water_supply_amount' => 3167229, 'notes' => '無'],
                ['observation_id' => '9468', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '連江縣自來水廠', 'water_quality' => 96.75, 'water_supply_amount' => 9786, 'notes' => '無'],
                ['observation_id' => '3853890', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '臺北自來水事業處', 'water_quality' => 99.51, 'water_supply_amount' => 3873026, 'notes' => '無'],
                ['observation_id' => '17136552', 'observation_date' => '2007-06-30 00:00:00', 'facility_name' => '台灣自來水股份有限公司(含高雄市)', 'water_quality' => 90.46, 'water_supply_amount' => 18944546, 'notes' => '無'],
                ['observation_id' => '74648', 'observation_date' => '2007-06-30 00:00:00', 'facility_name' => '金門縣自來水廠', 'water_quality' => 94.46, 'water_supply_amount' => 79023, 'notes' => '無'],
                ['observation_id' => '809050', 'observation_date' => '2007-06-30 00:00:00', 'facility_name' => '第一區管理處', 'water_quality' => 92.23, 'water_supply_amount' => 877164, 'notes' => '無'],
                // 可以依此類推，將其他數據加入
            ]);
    
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    Schema::dropIfExists('articles');
    }
}
