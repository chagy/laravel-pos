<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'sett_name',
        'sett_phone',
        'sett_tax_id',
        'sett_vat',
        'sett_owner',
    ];
}
