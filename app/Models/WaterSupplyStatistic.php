<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSupplyStatistic extends Model
{
    use HasFactory;


    // 指定表格名稱（可選，若表格名稱符合慣例可以省略）
    protected $table = 'water_supply_statistics';

    // 讓哪些欄位可以批量賦值（mass assignment）
    protected $fillable = [
        'ActualPopulationServed', 
        'DateTime', 
        'ExecutingUnit', 
        'PercentageOfPopulationServed', 
        'PopulationInServedArea', 
        'Remarks'
    ];

    // 設定時間戳（timestamps）為 false 如果你不想使用 created_at, updated_at 欄位
    // public $timestamps = false;
}
