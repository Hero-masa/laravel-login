<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::group(['middleware' => ['guest']], function() {
    // ログインフォーム表示
    Route::get('/',  'App\Http\Controllers\Auth\AuthController@showLogin')->name('login.show');
    // Route::get('/',
    // [AuthController::class, 'showLogin'])
    // ->name('login.show');

    // ログイン処理
    Route::post('/login',  'App\Http\Controllers\Auth\AuthController@login')->name('login');
    // Route::post('login',
    // [AuthController::class, 'login'])
    // ->name('login');

});

Route::group(['middleware' => ['auth']], function() {
    // ホーム画面
    Route::get('home', function() {
        return view('home');
    })->name('home');
    // ログアウト
    // Route::post('logout',
    // [AuthController::class, 'logout'])->name('logout');

    Route::post('logout',  'App\Http\Controllers\Auth\AuthController@logout')->name('logout');


});