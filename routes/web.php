<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PollController;
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

Route::get('/', [HomeController::class, 'home']);

Route::prefix('poll')->group(function () {
    Route::get('new', [PollController::class, 'new'])->name('poll.new');
    Route::post('new', [PollController::class, 'store'])->name('poll.store');
});
