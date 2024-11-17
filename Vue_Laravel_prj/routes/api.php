<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\LoginController;
// use App\Http\Controllers\Api\UsersController;

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

//商品削除
Route::delete('/goods/show/{goodsId}',[GoodsController::class, 'destroy']);

//ユーザー登録
Route::post('/register',[RegisterController::class,'register']);

//Laravelのミドルウェアが認証が必要なリソースにアクセスしようとした場合にリクエストをキャッチ
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']);