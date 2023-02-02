<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterPaymentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment'
        ];

        return view('admin.paymentData.index', $params);
    }


    public function view($id) {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment',
            "id"            => $id,
        ];
        return view('admin.paymentData.view', $params);
    }
}
