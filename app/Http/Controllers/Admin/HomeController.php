<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"    =>  'Admin - Water Payment List'
        ];

        return view('admin.index', $params);
    }
}