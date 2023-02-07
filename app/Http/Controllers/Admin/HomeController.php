<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\WaterPaymentList;
use App\Models\DetailWaterPaymentList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"            =>  'Admin - Water Payment List',
            "totalData"             =>  WaterPaymentList::count(),
            "totalDanaLunas"        =>  DetailWaterPaymentList::where('status', 1)->sum('total'),
            "totalDanaBelumLunas"   =>  DetailWaterPaymentList::where('status', 0)->sum('total'),
            "totalUser"             =>  User::count(),
        ];

        return view('admin.index', $params);
    }
}