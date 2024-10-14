<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\PollOptionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PollController::class, 'index'])->name('home');

Route::prefix('poll')->group(function () {
    Route::get('new', [PollController::class, 'new'])->name('poll.new');
    Route::get('{poll}', [PollController::class, 'show'])->name('poll.view');
    Route::post('new', [PollController::class, 'store'])->name('poll.store');
    Route::get('{pollId}/votes', [PollOptionController::class, 'getVotes'])->name('poll.votes');

});
Route::post('pollOption', [PollOptionController::class, 'store'])->name('pollOption.store');
Route::post('pollOption/{id}', [PollOptionController::class, 'vote'])->name('poll.vote');

Route::prefix('user')->group(function () {
    Route::get('register', [UserController::class, 'register'])->name('user.register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');

    Route::get('login', [UserController::class, 'login'])->name('user.login');
    Route::post('login', [UserController::class, 'auth'])->name('user.auth');
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
});
