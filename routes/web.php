<?php

use App\Http\Controllers\UserInfoController;
use App\Models\UserInfo;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userInfos', [App\Http\Controllers\UserInfoController::class, 'index'])->name('userInfos');
Route::get('/userInfos/create', [App\Http\Controllers\UserInfoController::class, 'create'])->name('userInfos.create');
Route::post('/userInfos/store', [App\Http\Controllers\UserInfoController::class, 'store'])->name('userInfos.store');
Route::delete('/userInfos/destroy/{id}', [App\Http\Controllers\UserInfoController::class, 'destroy'])->name('userInfos.destroy');
Route::get('/userInfos/edit/{id}', [App\Http\Controllers\UserInfoController::class, 'edit'])->name('userInfos.edit');
Route::put('/userInfos/{id}', [App\Http\Controllers\UserInfoController::class, 'update'])->name('userInfos.update');