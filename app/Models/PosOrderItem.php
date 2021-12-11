<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pos_order_id',
        'product_id',
        'psod_item_name',
        'psod_item_unit',
        'psod_item_price',
        'psod_item_qty',
        'psod_item_discount',
        'psod_item_discount_total',
    ];

    public function posOrder()
    {
        return $this->belongsTo(PosOrder::class,'pos_order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
