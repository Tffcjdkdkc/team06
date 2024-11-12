<?php

namespace App\Http\Controllers;

use App\Models\WaterSupplyStatistic;
use Illuminate\Http\Request;

class WaterSupplyStatisticController extends Controller
{
    public function water(Request $request)
    {
        // 基本查詢：抓取所有資料
        $statistics = WaterSupplyStatistic::query();

        // 如果有查詢條件，根據機構別過濾
        if ($request->has('ExecutingUnit') && $request->ExecutingUnit != '') {
            $statistics = $statistics->where('ExecutingUnit', 'like', '%' . $request->ExecutingUnit . '%');
        }

        // 執行查詢並取得結果
        $statistics = $statistics->paginate(10);

        // 返回視圖，並將統計資料傳遞給視圖
        return view('water', ['statistics' => $statistics]);
    }
}
