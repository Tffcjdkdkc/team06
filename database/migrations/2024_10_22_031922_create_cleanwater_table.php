<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


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
        $table->bigInteger('ActualPopulationServed')->comment('實際供水人數');
        $table->string('DateTime', 255)->comment('統計日期時間');
        $table->string('ExecutingUnit', 255)->comment('機構別');
        $table->decimal('PercentageOfPopulationServed', 5, 2)->comment('供水普及率');
        $table->bigInteger('PopulationInServedArea')->comment('行政區域人數');
        $table->string('Remarks', 255)->nullable()->comment('備註');
        $table->timestamps();
    });

      
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
