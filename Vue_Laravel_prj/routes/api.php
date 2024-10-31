<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;

//商品一覧
Route::get('/goods', [GoodsController::class, 'index']);

//商品追加
Route::post('/goods/create', [GoodsController::class, 'store']);