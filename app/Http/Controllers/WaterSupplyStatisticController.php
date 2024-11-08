<?php

namespace App\Http\Controllers;
use App\Models\WaterSupplyStatistic;

use Illuminate\Http\Request;

class WaterSupplyStatisticController extends Controller
{
    public function index()
    {
        // 使用 Eloquent 查詢資料
        $statistics = WaterSupplyStatistic::all(); // 取得所有資料

        // 可以加上排序、篩選等條件
        // $statistics = WaterSupplyStatistic::orderBy('DateTime', 'desc')->get();

        return view('water_supply_statistics.index', compact('statistics'));
    }
}
