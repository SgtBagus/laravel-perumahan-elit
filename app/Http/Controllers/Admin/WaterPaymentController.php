<?php

namespace App\Http\Controllers\Admin;

use App\Models\WaterPaymentList;

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
                                    'water_payment_lists.note as note',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )
                                ->orderBy('water_payment_lists.id', 'desc')->get(),
        ];

        return view('admin.paymentData.index', $params);
    }


    public function view($id) {
        $params = [
            "titlePages"    =>  'Payment List Details - Water Payment',
            "dataInvoices"   =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'pemilik.address as alamat_pemilik',
                                    'pemilik.email as email_pemilik',
                                    'water_payment_lists.total_harga as total_harga',
                                    'water_payment_lists.status as status',
                                    'water_payment_lists.note as note',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )->orderBy('water_payment_lists.id', 'desc')->find($id),
            "id"            =>  $id,
        ];
        return view('admin.paymentData.view', $params);
    }
}
