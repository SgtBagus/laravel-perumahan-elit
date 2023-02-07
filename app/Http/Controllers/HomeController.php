<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $params = [
            "titlePages"    =>  ''
        ];

        return view('index', $params);
    }
}
