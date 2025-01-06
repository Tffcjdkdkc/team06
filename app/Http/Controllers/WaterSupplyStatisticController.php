<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePopulationRequest;

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

    public function store(CreatePopulationRequest $request)
{
    // 驗證表單資料
    $data = $request->only([
        'ExecutingUnit',
        'DateTime',
        'ActualPopulationServed',
        'PopulationInServedArea',
        'Remarks',
    ]);

    // 計算供水普及率
    $percentage = ($data['ActualPopulationServed'] / $data['PopulationInServedArea']) * 100;

    // 將計算結果加到資料中
    $data['PercentageOfPopulationServed'] = round($percentage, 2);

    // 儲存資料
    $population = WaterSupplyStatistic::create($data);

    // 跳轉並帶入成功訊息
    return redirect('water')->with('success', '資料已成功新增！');
}


    public function update(CreatePopulationRequest $request, $id)
{
    // 根據 ID 查找對應的 Population 資料
    $population = WaterSupplyStatistic::findOrFail($id);

    // 驗證表單資料
    $data = $request->only([
        'ActualPopulationServed',
        'DateTime',
        'ExecutingUnit',
        'PopulationInServedArea',
        'Remarks',
    ]);

    // 檢查供水區域人口是否大於零，避免除以零錯誤
    if ($data['PopulationInServedArea'] <= 0) {
        return redirect()->back()->withErrors(['PopulationInServedArea' => '供水區域人口不能為零或負數。']);
    }

    // 計算供水普及率
    $percentage = ($data['ActualPopulationServed'] / $data['PopulationInServedArea']) * 100;

    // 添加計算後的百分比到資料
    $data['PercentageOfPopulationServed '] = $percentage;

    // 更新該資料
    $population->update($data);

    // 重定向到資料列表頁面
    return redirect()->route('water')->with('success', '資料更新成功!');
}


    public function show($id)
    {
        $statistic = WaterSupplyStatistic::findOrFail($id);
        return view('water.show', compact('statistic'));
    }
}
