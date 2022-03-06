<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'prom_name',
        'prom_begin',
        'prom_end',
        'prom_status',
        'prom_desc',
    ];

    public function productItems()
    {
        return $this->hasMany(PromotionProduct::class,'promotion_id');
    }

    public function conditionItems()
    {
        return $this->hasMany(PromotionCondition::class,'promotion_id');
    }
}
