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
        return view('water.water', compact('statistics'));
    }

    public function destroy($id)
    {
        // 查找並刪除指定ID的資料
        $statistic = WaterSupplyStatistic::findOrFail($id);
        $statistic->delete();

        // 刪除後重定向回水資源統計頁
        return redirect('/water')->with('success', '資料已成功刪除');
    }

    public function edit($id)
    {
        // 查詢指定 ID 的資料
        $statistic = WaterSupplyStatistic::find($id);

        // 如果找不到對應的資料，返回 404 錯誤
        if (!$statistic) {
            abort(404); // 如果資料不存在，直接返回 404 頁面
        }

        // 返回編輯視圖，並將資料傳遞給視圖
        return view('water.edit', compact('statistic'));
    }

    public function create()
    {
        return view('water.create');  // 返回水資源統計表單視圖
    }

    public function store(Request $request)
    {
        // 驗證輸入
        $validated = $request->validate([
            'ExecutingUnit' => 'required|string|max:255',
            'DateTime' => 'required|date',
            'ActualPopulationServed' => 'required|numeric',
            'PopulationInServedArea' => 'required|numeric',
            'Remarks' => 'nullable|string',
        ]);

        // 計算供水普及率
        $percentage = ($validated['ActualPopulationServed'] / $validated['PopulationInServedArea']) * 100;

        // 新增資料
        $statistic = new WaterSupplyStatistic();
        $statistic->ExecutingUnit = $validated['ExecutingUnit'];
        $statistic->DateTime = $validated['DateTime'];
        $statistic->ActualPopulationServed = $validated['ActualPopulationServed'];
        $statistic->PopulationInServedArea = $validated['PopulationInServedArea'];
        $statistic->PercentageOfPopulationServed = $percentage;
        $statistic->Remarks = $validated['Remarks'];

        // 保存數據
        $statistic->save();

        // 跳轉或返回
        return redirect()->route('water')->with('success', '資料已成功新增！');
    }

    public function update(Request $request, $id)
    {
        // 驗證輸入
        $validated = $request->validate([
            'ExecutingUnit' => 'required|string|max:255',
            'DateTime' => 'required|date',
            'ActualPopulationServed' => 'required|numeric',
            'PopulationInServedArea' => 'required|numeric',
            'Remarks' => 'nullable|string',
        ]);

        // 查找要更新的資料
        $statistic = WaterSupplyStatistic::findOrFail($id);

        // 更新資料
        $statistic->ExecutingUnit = $validated['ExecutingUnit'];
        $statistic->DateTime = $validated['DateTime'];
        $statistic->ActualPopulationServed = $validated['ActualPopulationServed'];
        $statistic->PopulationInServedArea = $validated['PopulationInServedArea'];
        $statistic->Remarks = $validated['Remarks'];

        // 計算供水普及率
        $percentage = ($validated['ActualPopulationServed'] / $validated['PopulationInServedArea']) * 100;
        $statistic->PercentageOfPopulationServed = $percentage;

        // 保存更新
        $statistic->save();

        // 跳轉或返回
        return redirect()->route('water')->with('success', '資料已成功更新！');
    }

    public function show($id)
    {
        $statistic = WaterSupplyStatistic::findOrFail($id);
        return view('water.show', compact('statistic'));
    }
}
