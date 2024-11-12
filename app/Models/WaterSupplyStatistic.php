<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterSupplyStatistic extends Model
{
    // 定義資料表名稱
    protected $table = 'water_supply_statistics';


    protected $fillable = [
        'ExecutingUnit',
        'DateTime',
        'ActualPopulationServed',
        'PercentageOfPopulationServed',
        'PopulationInServedArea',
        'Remarks'
    ];


}
