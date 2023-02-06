<?php

namespace App\Http\Controllers\Admin;

use App\Models\NominalValue;
use App\Models\DetailWaterPaymentList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DetailPaymentLists extends Controller {
    public function update(Request $request, $id) {
        $masterId           = DetailWaterPaymentList::where('id', $id)->pluck('water_payment_id')->first();
        $lastMeter          = DetailWaterPaymentList::where('id', $id)->pluck('last_meter')->first();
        $nominalValue       = NominalValue::pluck('value')->first();
        $meterAdded         = intval($request->currentMeter - $lastMeter);
        $total              = floatval($meterAdded * $nominalValue);

        $details = DetailWaterPaymentList::findOrFail($id);
        $details->update([
            'current_meter'         =>  intval($request->currentMeter),
            'meter_added_value'     =>  $meterAdded,
            'total'                 =>  $total,
            'updated_at'            =>  date('Y-m-d H:i:s'),
        ]);

        DB::statement("UPDATE water_payment_lists SET total_harga = $total WHERE id = $masterId");

        return redirect()->back();
    }
}
