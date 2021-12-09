<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'subd_code',
        'subd_name',
        'subd_desc',
        'subd_status',
        'subd_zip_code',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}
