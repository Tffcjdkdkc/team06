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
// 登入頁面
Route::get('login', function () {
    return view('auth.login');
})->name('login');
// 根目錄
Route::get('/', function () {
    return view('welcome');
});
// SDG 頁面
Route::get('/sdgs', [SDGController::class, 'index']);

// Water Supply 相關路由

// 顯示統計資料頁面
Route::get('/water', [WaterSupplyStatisticController::class, 'water'])->name('water');

// routes/web.php

// 顯示新增資料的表單，只有 manager 或 admin 可以訪問
Route::middleware(['auth', 'can:manager-or-admin'])->get('WaterSupplyStatistic/create', [WaterSupplyStatisticController::class, 'create'])->name('WaterSupplyStatistic.create');

// 顯示編輯資料的表單，只有 manager 或 admin 可以訪問
Route::middleware(['auth', 'can:manager-or-admin'])->get('WaterSupplyStatistic/edit/{id}', [WaterSupplyStatisticController::class, 'edit'])->name('WaterSupplyStatistic.edit');

// 儲存新增的資料
Route::post('WaterSupplyStatistic/store', [WaterSupplyStatisticController::class, 'store'])->name('WaterSupplyStatistic.store');

// 刪除資料
Route::delete('WaterSupplyStatistic/delete/{id}', [WaterSupplyStatisticController::class, 'destroy'])->where('id', '[0-9]+')->name('WaterSupplyStatistic.destroy');


// 更新資料
Route::put('WaterSupplyStatistic/update/{id}', [WaterSupplyStatisticController::class, 'update'])->name('WaterSupplyStatistic.update');

// 顯示單筆資料頁面
Route::get('water/{id}', [WaterSupplyStatisticController::class, 'show'])->name('WaterSupplyStatistic.show');

// 驗證和註冊路由
Auth::routes();

// 進入主頁面（通常是登入後的首頁）
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');