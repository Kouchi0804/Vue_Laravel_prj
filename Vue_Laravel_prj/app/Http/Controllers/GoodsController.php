<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;  // Goodsモデル

class GoodsController extends Controller
{

    public function index()
    {
        //Goodsテーブルの情報を全件取得
        //return Goods::all();
        //$goodslist = Goods::all();
        //return response()->json($goodslist);
        
        //ページネーション作成のため、response関数でjson形式で返す
        $goodslist = Goods::paginate(10);
        return response()->json($goodslist);
    }

    public function create()
    {
        //
    }

    /**
     * 送られたデータをデータベースに保存
     */
    public function store(Request $request)
    {
        //バリデーション
        $validatedData = $request->validate([
            'goods_title' => 'required',
            'goods_price' => 'required',
            'goods_stock' => 'required',
            'goods_comment' => 'nullable',
            'goods_img' => 'nullable|image|max:2048',
        ]);

        //DBに登録
        $goods = Goods::create($validatedData);


        return response()->json(['message' => 'Item created successfully', 'item' => $goods], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
