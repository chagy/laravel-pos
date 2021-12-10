<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'sup_name',
        'sup_tax_number',
        'sup_email',
        'sup_phone',
        'sup_address',
        'province_id',
        'district_id',
        'sub_district_id',
        'sup_zip_code',
        'sup_contact_name',
        'sup_contact_phone',
        'sup_status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class,'sub_district_id');
    }
}
