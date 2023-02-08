<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\User;
use App\Models\WaterPaymentList;
use App\Models\DetailWaterPaymentList;
use App\Models\NominalValue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WaterPaymentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $params = [
            "titlePages"    =>  'Payment List - Water Payment',
            "paymentLists"  =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )
                                ->orderBy('water_payment_lists.id', 'desc')->get(),
            "userList"      => User::latest()->get(),
            "mNominalValue" =>  NominalValue::pluck('value')->first(),
        ];

        $role = Auth::user()->role; 
        switch ($role) {
            case 'admin':
                return view('admin.paymentData.index', $params);
                break;
        
            case 'casher':
                return view('paymentData.index', $params);
                break;
        
            case 'noted':
                return view('paymentData.index', $params);
                break;

            default:
                return '/dashboard'; 
                break;
        }
    }

    public function store(Request $request) {
        $date                   = date('Y-m-d H:i:s');
        $nominalValue           = NominalValue::pluck('value')->first();

        $waterPaymentListId     = WaterPaymentList::where('user_id', $request->user)->first('id');
        $lastMeter              = DetailWaterPaymentList::where('water_payment_id', $waterPaymentListId->id)->max('current_meter');

        $currentMeter           = $request->currentmountmeter;
        $meterAdded             = $currentMeter - $lastMeter;
        $total                  = floatval(($currentMeter) * $nominalValue);

        DetailWaterPaymentList::create([
            'water_payment_id'      => intval($waterPaymentListId->id),
            'last_meter'            => $lastMeter,
            'current_meter'         => $currentMeter,
            'meter_added_value'     => $meterAdded,
            'total'                 => $total,
            'status'                => 0,
            'created_at'            => $date,
            'updated_at'            => $date,
        ]);


        $updatedBy              = Auth::user()->id;
        DB::statement("UPDATE water_payment_lists SET updated_by = $updatedBy WHERE user_id = $request->user");

        return \Redirect::route('water-payment.show', $waterPaymentListId);
    }

    public function show($id) {
        $params = [
            "titlePages"    =>  'Payment List Details - Water Payment',
            "dataInvoices"  =>  WaterPaymentList::join('users AS pemilik', 'pemilik.id', '=', 'water_payment_lists.user_id')
                                ->join('users AS pembuat', 'pembuat.id', '=', 'water_payment_lists.updated_by')
                                ->select(
                                    'water_payment_lists.id as id',
                                    'pemilik.name as pemilik',
                                    'pemilik.address as alamat_pemilik',
                                    'pemilik.email as email_pemilik',
                                    'pembuat.name as pembuat',
                                    'water_payment_lists.updated_at as updated_at',
                                )->orderBy('water_payment_lists.id', 'desc')->find($id),
            "mNominalValue" =>  NominalValue::pluck('value')->first(),
            "detailsList"   =>  DetailWaterPaymentList::where('water_payment_id', '=', $id)->get(),
            "totalDepts"    =>  DetailWaterPaymentList::where('status', 0)->where('water_payment_id', $id)->sum('total'),
        ];

        $role = Auth::user()->role; 
        switch ($role) {
            case 'admin':
                return view('admin.paymentData.view', $params);
                break;
        
            case 'noted':
                return view('paymentData.view', $params);
                break;

            default:
                return '/dashboard'; 
                break;
        }
    }
}
