<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWaterPaymentList extends Model {
    use HasFactory;

    
    protected $fillable = [
        'current_meter', 'meter_added_value', 'total',
    ];
}
