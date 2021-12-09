<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'dist_code',
        'dist_name',
        'dist_desc',
        'dist_status',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}
