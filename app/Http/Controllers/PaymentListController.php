<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentListController extends Controller {
    public function index() {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment'
        ];

        return view('paymentData.index', $params);
    }

    public function view($id) {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment',
            "id"            => $id,
        ];

        return view('paymentData.view', $params);
    }
}
