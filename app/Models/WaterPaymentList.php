<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterPaymentList extends Model {
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['value'];
}
