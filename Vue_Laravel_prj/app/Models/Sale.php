<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /** @use HasFactory<\Database\Factories\SaleFactory> */
    use HasFactory;
    
    protected $fillable = [
        'goods_title',
        'goods_price',
        'goods_stock',
        'goods_comment',
        'goods_img',
    ];
}
