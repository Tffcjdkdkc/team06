<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaterSupplyStatisticController;
use App\Http\Controllers\SDGController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sdgs', [SDGController::class, 'index']);

// 顯示新增表單
Route::get('/water', [WaterSupplyStatisticController::class, 'water'])->name('water');

// 顯示新增資料的表單
Route::get('WaterSupplyStatistic/create', [WaterSupplyStatisticController::class, 'create'])->name('WaterSupplyStatistic.create');

// 用於保存新增的資料
Route::post('WaterSupplyStatistic/store', [WaterSupplyStatisticController::class, 'store'])->name('WaterSupplyStatistic.store');

// 用於刪除資料
Route::delete('WaterSupplyStatistic/delete/{id}', [WaterSupplyStatisticController::class, 'destroy'])->where('id', '[0-9]+')->name('WaterSupplyStatistic.destroy');

// 顯示編輯表單
Route::get('WaterSupplyStatistic/edit/{id}', [WaterSupplyStatisticController::class, 'edit'])->name('WaterSupplyStatistic.edit');

// 更新資料
Route::put('WaterSupplyStatistic/update/{id}', [WaterSupplyStatisticController::class, 'update'])->name('WaterSupplyStatistic.update');
//顯示
Route::get('water/{id}', [WaterSupplyStatisticController::class, 'show'])->name('WaterSupplyStatistic.show');
