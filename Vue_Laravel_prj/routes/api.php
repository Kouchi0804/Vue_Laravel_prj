<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;

//商品一覧
Route::get('/goods', [GoodsController::class, 'index']);

//商品追加
Route::post('/goods/create', [GoodsController::class, 'store']);

//商品詳細
//コントローラーにidを渡す
Route::get('/goods/show/{goodsId}', [GoodsController::class, 'show']);

//商品編集
Route::get('/goods/update/{goodsId}', [GoodsController::class, 'show']);
Route::put('/goods/update/{goodsId}', [GoodsController::class, 'update']);