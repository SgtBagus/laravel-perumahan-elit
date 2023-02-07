<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\WaterPaymentList;
use App\Models\DetailWaterPaymentList;
use App\Models\NominalValue;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $idWalletList       =   WaterPaymentList::where('user_id', Auth::user()->id)->first('id');
        
        $params = [
            "titlePages"    =>  'Home - Water Payment',
            "dataInvoices"  =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'pemilik.address as alamat_pemilik',
                                    'pemilik.email as email_pemilik',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )->orderBy('water_payment_lists.id', 'desc')->where('user_id', Auth::user()->id)->first(),
            "mNominalValue" =>  NominalValue::pluck('value')->first(),
            "detailsList"   =>  DetailWaterPaymentList::where('water_payment_id', '=', $idWalletList->id)->get(),
            "totalDepts"    =>  DetailWaterPaymentList::where('status', 0)->where('water_payment_id', $idWalletList->id)->sum('total'),
        ];

        return view('dashboard', $params);
    }
}
