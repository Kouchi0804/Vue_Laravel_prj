<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'goods_title' => $this->faker->word,
            'goods_price' => $this->faker->numberBetween(100, 10000), // 100から10,000の範囲のダミー価格
            'goods_stock' => $this->faker->randomDigit, // 0から9のランダムな数字でダミーの在庫数
            'goods_comment' => $this->faker->realText($maxNbChars = 35),
            'goods_img' => 'https://picsum.photos/200/200',  // 200x300のランダムな画像
        ];
    }
}
