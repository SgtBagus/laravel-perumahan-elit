<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\NominalValue;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"    =>  'Home - Water Payment',
            "dataInvoices"  =>  '253',
            "mNominalValue" =>  '2323',
            "detailsList"   =>  '2332',
            "totalDepts"    =>  '2323',
        ];

        return view('dashboard', $params);
    }
}
