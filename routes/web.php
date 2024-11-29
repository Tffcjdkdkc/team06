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
});





Route::get('populations', [PopulationsController::class, 'index'])->name('populations.index');
Route::get('populations/{id}', [PopulationsController::class, 'show'])->where('id', '[0-9]+')->name('populations.show');
Route::get('populations/{id}/edit', [PopulationsController::class, 'edit'])->where('id', '[0-9]+')->name('populations.edit');















 