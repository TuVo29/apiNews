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
