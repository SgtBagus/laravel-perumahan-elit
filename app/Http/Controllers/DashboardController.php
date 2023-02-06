<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index() {
        $params = [
            "titlePages"    =>  'Home - Water Payment'
        ];

        return view('dashboard', $params);
    }
}
