<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('/', [PageController::class, 'home'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/work', [WorkController::class, 'index']);
Route::get('/work/{work}', [WorkController::class, 'show'])->name('work');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
