<?php

namespace App\Http\Controllers\Admin;

use App\Models\WaterPaymentList;
use App\Models\DetailWaterPaymentList;
use App\Models\NominalValue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterPaymentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment',
            "paymentLists"  =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'water_payment_lists.total_harga as total_harga',
                                    'water_payment_lists.status as status',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )
                                ->orderBy('water_payment_lists.id', 'desc')->get(),
        ];

        return view('admin.paymentData.index', $params);
    }


    public function show($id) {
        $params = [
            "titlePages"    =>  'Payment List Details - Water Payment',
            "dataInvoices"  =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'pemilik.address as alamat_pemilik',
                                    'pemilik.email as email_pemilik',
                                    'water_payment_lists.total_harga as total_harga',
                                    'water_payment_lists.status as status',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )->orderBy('water_payment_lists.id', 'desc')->find($id),
            "mNominalValue" =>  NominalValue::pluck('value')->first(),
            "detailsList"   =>  DetailWaterPaymentList::where('water_payment_id', '=', $id)->get(),
            "totalDepts"    =>  DetailWaterPaymentList::where('status', 0)->where('water_payment_id', $id)->sum('total'),
        ];
        return view('admin.paymentData.view', $params);
    }

    public function update(Request $request, $id) {
        if ($request->type === 'details') {
            $lastMeter = DetailWaterPaymentList::pluck('meter_added_value')->where('id', $id)->first();

            var_dump($lastMeter);
            exit();

            // $details = DetailWaterPaymentList::findOrFail($id);
            // $details->update([
            //     'current_meter'         => intval($request->currentMeter),
            //     'meter_added_value'     => intval($request->currentMeter),
            //     'updated_at'            => date('Y-m-d H:i:s'),
            // ]);
        }
        // $users = DetailWaterPaymentList::findOrFail($id);

        // $users->update([
        //     'name'      => $request->name,
        //     'email'     => $request->email,
        //     'address'   => $request->address,
        //     'role'      => $request->role,
        //     'updated_at'            => date('Y-m-d H:i:s'),
        // ]);

        return redirect()->back();
    }
}
