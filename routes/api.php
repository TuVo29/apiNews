<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhomTinController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\Admin\BinhLuanControllerAdmin;
use App\Http\Controllers\Admin\LoaiTinControllerAdmin;
use App\Http\Controllers\Admin\NhomTinControllerAdmin;
use App\Http\Controllers\Admin\TinControllerAdmin;
use App\Http\Controllers\Admin\UserControllerAdmin;

// User routes

//NhomTin
Route::apiResource('nhom-tin', NhomTinController::class);

//LoaiTin
Route::apiResource('loai-tin', LoaiTinController::class);
Route::get('loai-tin/{loaiTin}/tin', [LoaiTinController::class, 'getTinByLoaiTin']);

//Tin
Route::apiResource('tin', TinController::class);
Route::get('tin/search', [TinController::class, 'search']);
Route::get('tin-hot', [TinController::class, 'getTinHot']);

//BinhLuan
Route::apiResource('binh-luan', BinhLuanController::class);
Route::get('tin/{tin}/binh-luan', [BinhLuanController::class, 'getBinhLuanByTin']);

// Admin routes
Route::prefix('admin')->group(function () {

    //BinhLuan
    Route::get('binh-luan', [BinhLuanControllerAdmin::class, 'index']);
    Route::put('binh-luan/{id}', [BinhLuanControllerAdmin::class, 'update']);
    Route::delete('binh-luan/{id}', [BinhLuanControllerAdmin::class, 'destroy']);
    Route::post('binh-luan', [BinhLuanControllerAdmin::class, 'store']);

    //Tin
    Route::get('tin', [TinControllerAdmin::class, 'index']);
    Route::get('tin/{id}', [TinControllerAdmin::class, 'show']);
    Route::post('tin',[TinControllerAdmin::class,'store']);
    Route::put('tin/{id}', [TinControllerAdmin::class, 'update']);
    Route::delete('tin/{id}', [TinControllerAdmin::class, 'destroy']);

    //LoaiTin
    Route::get('loai-tin', [LoaiTinControllerAdmin::class, 'index']);
    Route::get('loai-tin/{id}', [LoaiTinControllerAdmin::class, 'show']);
    Route::post('loai-tin', [LoaiTinControllerAdmin::class, 'store']);
    Route::put('loai-tin/{id}', [LoaiTinControllerAdmin::class, 'update']);
    Route::delete('loai-tin/{id}', [LoaiTinControllerAdmin::class, 'destroy']);

    //NhomTin
    Route::get('nhomtin', [NhomTinControllerAdmin::class, 'index'])->name('admin.nhomtin.index');
    Route::post('nhomtin', [NhomTinControllerAdmin::class, 'store'])->name('admin.nhomtin.store');
    Route::get('nhomtin/{nhomTin}', [NhomTinControllerAdmin::class, 'show'])->name('admin.nhomtin.show');
    Route::put('nhomtin/{nhomTin}', [NhomTinControllerAdmin::class, 'update'])->name('admin.nhomtin.update');
    Route::delete('nhomtin/{nhomTin}', [NhomTinControllerAdmin::class, 'destroy'])->name('admin.nhomtin.destroy');

    //Users
    Route::get('users', [UserControllerAdmin::class, 'index']);
    Route::get('users/{id}', [UserControllerAdmin::class, 'show']);
    Route::post('users', [UserControllerAdmin::class, 'store']);
    Route::put('users/{id}', [UserControllerAdmin::class, 'update']);
    Route::delete('users/{id}', [UserControllerAdmin::class, 'destroy']);
});