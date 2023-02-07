<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWaterPaymentList extends Model {
    use HasFactory;

    
    protected $fillable = [
        'water_payment_id', 'last_meter', 'current_meter', 'status', 'meter_added_value', 'total',
    ];
}
