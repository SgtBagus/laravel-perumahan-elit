<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaterPaymentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $params = [
            "titlePages"    =>  'Water Payment List'
        ];

        return view('admin.WaterPayment.index', $params);
    }

    public function view() {
        $params = [
            "titlePages"    =>  'Water Payment List - View'
        ];
        return view('admin.WaterPayment.form', $params);
    }
}
