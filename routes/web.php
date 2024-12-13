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

Route::get('/home', function () {
    return view('home');
})->name('home.index');


Route::post('populations/store', [PopulationsController::class, 'store'])->name('populations.store');
Route::get('populations/create', [PopulationsController::class, 'create'])->name('populations.create'); //新增資料
Route::get('populations', [PopulationsController::class, 'index'])->name('populations.index'); //網頁
Route::get('populations/{id}', [PopulationsController::class, 'show'])->where('id', '[0-9]+')->name('populations.show'); //查看資料
Route::get('populations/{id}/edit', [PopulationsController::class, 'edit'])->where('id', '[0-9]+')->name('populations.edit'); //編輯資料
Route::put('populations/{id}', [PopulationsController::class, 'update'])->name('populations.update'); //更新上傳儲存編輯資料
Route::delete('populations/delete/{id}', [PopulationsController::class, 'destroy'])->where('id', '[0-9]+')->name('populations.destroy'); //刪除資料















 