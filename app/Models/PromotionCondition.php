<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_id',
        'prom_con_qty',
        'prom_com_discount',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class,'promotion_id');
    }
}
