<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

     protected $fillable = [
         'supplier_id',
         'impo_total',
         'impo_process',
         'impo_qty',
         'created_by',
         'updated_by'
     ];

     public function supplier()
     {
         return $this->belongsTo(Supplier::class,'supplier_id');
     }

     public function createdBy()
     {
         return $this->belongsTo(User::class,'created_by');
     }

     public function updatedBy()
     {
         return $this->belongsTo(User::class,'updated_by');
     }
}
