<?php

namespace App\Http\Controllers\Admin;

use App\Models\NominalValue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NominalValueController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $params = [
            "titlePages"    => 'Nominal Value',
            "datas"          => NominalValue::find(1),
        ];

        return view('admin.nominalValue.index', $params);
    }
        
    public function update(Request $request, $id) {
        $nominalValue = NominalValue::findOrFail($id);

        $nominalValue->update([
            'value' => $request->nominal,
            'note' => $request->note,
        ]);

        return redirect()->back();
    }
}
