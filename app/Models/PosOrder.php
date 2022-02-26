<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'customer_id',
        'psod_qty',
        'psod_total',
        'psod_discount_extra',
        'psod_discount_item',
        'psod_vat',
        'psod_vat_amount',
        'psod_net_total',
        'psod_money',
        'psod_change',
        'psod_note',
        'psod_status',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function items()
    {
        return $this->hasMany(PosOrderItem::class,'pos_order_id');
    }
}
