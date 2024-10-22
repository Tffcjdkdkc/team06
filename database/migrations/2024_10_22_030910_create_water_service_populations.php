<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaterServicePopulations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_service_populations', function (Blueprint $table) {
            $table->id(); // 主鍵，自動遞增
            $table->integer('actual_population_served')->comment('實際供水人數'); // 實際服務人口
            $table->dateTime('date_time')->comment('統計日期時間'); // 記錄日期
            $table->string('executing_unit', 100)->comment('機構別'); // 執行單位名稱
            $table->double('percentage_of_population_served', 5, 2)->comment('供水普及率'); // 服務人口百分比
            $table->integer('population_in_served_area')->comment('行政區域人數'); // 服務區域內人口
            $table->string('remarks', 255)->nullable()->comment('備註'); // 備註，可為空
            $table->timestamps(); // created_at 和 updated_at 欄位
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('water_service_populations');
    }
}
