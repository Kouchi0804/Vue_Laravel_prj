<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Sale;
use App\Models\Goods;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    // Factoryに対応するモデル
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 既存のGoodとUserからランダムに取得、存在しない場合は新規作成
        $good = Goods::inRandomOrder()->first() ?? Goods::factory()->create();
        $user = User::inRandomOrder()->first() ?? User::factory()->create();

        // ダミーデータを生成
        $quantity = $this->faker->numberBetween(1, 100);
        $unitPrice = $good->goods_price; // 商品の単価を使用
        $totalPrice = $quantity * $unitPrice;

        return [
            'good_id' => $good->id,
            'user_id' => $user->id,
            'quantity' => $quantity, // 購入数
            'unit_price' => $unitPrice, // 単価
            'total_price' => $totalPrice, // 合計金額
            'purchased_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // 過去1年間のランダムな日時
            'payment_status' => $this->faker->randomElement(['unpaid', 'paid', 'pending']), // 支払いステータス
        ];
    }
}
