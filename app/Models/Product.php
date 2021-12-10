<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'prod_name',
        'prod_unit',
        'prod_cost',
        'prod_price',
        'prod_qty',
        'prod_discount',
        'prod_bar_code',
        'prod_picture',
        'prod_status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
