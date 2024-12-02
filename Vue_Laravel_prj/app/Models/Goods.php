<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Goods extends Model
{
    use HasFactory;


    protected $fillable = [
        'good_id',
        'user_id',
        'quantity',
        'unit_price',
        'total_price',
        'purchased_at',
        'payment_status',
    ];
}
