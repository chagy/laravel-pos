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
}
