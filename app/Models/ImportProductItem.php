<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'import_id',
        'product_id',
        'ipi_name',
        'ipi_qty',
        'ipi_unit',
        'ipi_price',
        'ipi_total',
    ];

    public function import()
    {
        return $this->belongsTo(Import::class,'import_id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
