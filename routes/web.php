<?php

use App\Http\Controllers\PopulationsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/sdgs', function () {
    return view('sdgs');
})->name('sdgs.index');




Route::post('populations/store', [PopulationsController::class, 'store'])->name('populations.store');
Route::get('populations/create', [PopulationsController::class, 'create'])->name('populations.create'); //新增資料
Route::get('populations', [PopulationsController::class, 'index'])->name('populations.index'); //顯示全部資料的頁面
Route::get('populations/{id}', [PopulationsController::class, 'show'])->where('id', '[0-9]+')->name('populations.show'); //查看資料
Route::get('populations/{id}/edit', [PopulationsController::class, 'edit'])->where('id', '[0-9]+')->name('populations.edit'); //編輯資料
Route::put('populations/{id}', [PopulationsController::class, 'update'])->name('populations.update'); //儲存資料
Route::delete('populations/delete/{id}', [PopulationsController::class, 'destroy'])->where('id', '[0-9]+')->name('populations.destroy'); //刪除資料

Route::get('/populations/create', function () {
    // 檢查用戶是否已登入且是 admin
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('populations.create');  // admin 用戶才能看到此頁面
    }

     // 如果用戶不是 admin，則返回 401 錯誤頁面
     abort(401);  // 會顯示 401 Unauthorized 錯誤頁面
})->name('populations.create')->middleware('auth');  // 確保使用者已經登入
//防止其他用戶手動輸入網址進入create,只有admin才能進入新增資料畫面












 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
