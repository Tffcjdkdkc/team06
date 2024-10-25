<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCleanWaterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('water_supply_statistics', function (Blueprint $table) {
        $table->id();
        $table->string('observation_id', 50)->comment('觀察ID');
        $table->dateTime('observation_date')->comment('觀察日期');
        $table->string('facility_name', 100)->comment('設施名稱');
        $table->decimal('water_quality', 5, 2)->comment('水質評分');
        $table->integer('water_supply_amount')->comment('供水量');
        $table->string('notes', 100)->nullable()->comment('備註');
        $table->timestamps();
    });

        // 在這裡插入數據
        DB::table('water_supply_statistics')->insert([
            ['observation_id' => '17082199', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '台灣自來水股份有限公司(含高雄市)', 'water_quality' => 90.3, 'water_supply_amount' => 18917224, 'notes' => '無'],
            ['observation_id' => '72218', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '金門縣自來水廠', 'water_quality' => 94.41, 'water_supply_amount' => 76491, 'notes' => '無'],
            ['observation_id' => '807377', 'observation_date' => '2006-12-31 00:00:00', 'facility_name' => '第一區管理處', 'water_quality' => 92.15, 'water_supply_amount' => 876188, 'notes' => '無'],
            // 其他數據依此類推...
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_supply_statistics'); // 確保表格名稱一致
    }
}
