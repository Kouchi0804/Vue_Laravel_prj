<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_title',
        'goods_price',
        'goods_stock',
        'goods_comment',
        'goods_img',
    ];
}
