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

        // 画像ファイルの処理
        if ($request->hasFile('goods_img')) {
            $filename = $request->goods_img->getClientOriginalName();
            $filePath = $request->goods_img->storeAs('goods', $filename, 'public');
            $validatedData['goods_img'] = '/storage/' . $filePath;
        }

        //DBに登録
        $goods = Goods::create($validatedData);


        return response()->json(['message' => '商品を登録しました', 'item' => $goods], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return $id;

        $goods = Goods::find($id);
        
        if(!$goods){
            return response()->json(['message' => '商品が存在しません'], 404);
        }

        return response()->json($goods);
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
        //バリデーション
        $validatedData = $request->validate([
            'goods_title' => 'required',
            'goods_price' => 'required',
            'goods_stock' => 'required',
            'goods_comment' => 'nullable',
            'goods_img' => 'nullable',
        ]);

        //モデルの取得
        //findOrFail
        //指定したidのレコードを取得　対象がないときは404
        $goods = Goods::findOrFail($id);

        $goods->update($validatedData);

        return response()->json(['message' => '商品情報を更新しました', 'user' => $goods]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
