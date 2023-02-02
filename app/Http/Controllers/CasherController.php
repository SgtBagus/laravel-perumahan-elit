<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasherController extends Controller {
    public function index() {
        $params = [
            "titlePages"    =>  'Kasir - Water Payment'
        ];

        return view('paymentData.index', $params);
    }
    
    public function view($id) {
        $params = [
            "titlePages"    => "Detail Data: {$id} - Water Payment",
            "id"            => $id,
        ];

        return view('paymentData.view', $params);
    }
}
