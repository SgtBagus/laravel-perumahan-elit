<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\NominalValue;
use App\Models\DetailWaterPaymentList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DetailPaymentLists extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function update(Request $request, $id) {
        $updatedBy          = Auth::user()->id;

        $masterId           = DetailWaterPaymentList::where('id', $id)->pluck('water_payment_id')->first();
        $lastMeter          = DetailWaterPaymentList::where('id', $id)->pluck('last_meter')->first();
        $nominalValue       = NominalValue::pluck('value')->first();

        $meterAdded         = intval($request->currentMeter - $lastMeter);

        $updatedAt          = date('Y-m-d H:i:s');

        if ($request->typeEdit === 'meterEdit') {
            $details = DetailWaterPaymentList::findOrFail($id);
            $details->update([
                'current_meter'         =>  intval($request->currentMeter),
                'meter_added_value'     =>  $meterAdded,
                'updated_at'            =>  $updatedAt,
            ]);
        } else {
            $statusValue = intval($request->status);

            DB::statement("UPDATE detail_water_payment_lists SET status = $statusValue, updated_at = '$updatedAt' WHERE id = $id");
        }

        DB::statement("UPDATE water_payment_lists SET updated_by = $updatedBy WHERE id = $masterId");

        return redirect()->back();
    }
}
