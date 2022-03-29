<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sendMailController;

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
Route::get('forget-password', [sendMailController::class, 'getFormReset']);
Route::post('forget-password', [sendMailController::class, 'postFormReset'])->name('post.forget.password');

Route::get('get-password/{user}/{token}', [sendMailController::class, 'getPassword']);
Route::get('get-password/{user}/{token}', [sendMailController::class, 'resetPassword'])->name('post.reset.password');
