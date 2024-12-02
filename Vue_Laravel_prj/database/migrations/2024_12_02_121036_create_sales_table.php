<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // 売上ID（主キー）

            //$table->unsignedBigInteger('product_id'); // 商品ID（外部キー）
            $table->foreignId('good_id')->constrained('goods')->cascadeOnUpdate()->cascadeOnDelete();

            //$table->unsignedBigInteger('user_id')->nullable(); // ユーザーID（外部キー）
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();

            $table->integer('quantity'); // 購入数
            $table->decimal('unit_price', 8, 2); // 単価（小数点2桁まで）
            $table->decimal('total_price', 10, 2); // 合計金額（小数点2桁まで）
            $table->timestamp('purchased_at'); // 購入日時
            $table->string('payment_status')->default('unpaid'); // 支払いステータス（デフォルト未払い）
            $table->timestamps(); // 作成日時・更新日時

            // 外部キー制約
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
