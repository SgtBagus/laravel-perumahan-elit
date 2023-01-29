<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NominalValueController extends Controller {
    public function index() {
        $params = [
            "titlePages"    =>  'Nominal Value'
        ];

        return view('admin.nominalValue.index', $params);
    }
}
