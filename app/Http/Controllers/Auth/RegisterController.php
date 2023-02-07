<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\Models\User;
use App\Models\NominalValue;
use App\Models\WaterPaymentList;
use App\Models\DetailWaterPaymentList;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
    use RegistersUsers;

    protected function redirectTo() {
        return '/dashboard';
    }

    public function __construct() {
        $this->middleware('guest');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address'       => ['required', 'string', 'max:255'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'lastmeteran'   => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data) {
        $date           = date('Y-m-d H:i:s');
        
        $user = User::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'address'       => $data['address'],
            'role'          => 'users',  
            'password'      => Hash::make($data['password']),
            'created_at'    => $date,
            'updated_at'    => $date,
        ]);

        $userId         = User::pluck('id')->last();
        DB::statement("INSERT INTO water_payment_lists (user_id, updated_by, updated_at, created_at) values ($userId, $userId, '$date', '$date')");

        $lastMeter      = $data['lastmeteran'];
        $nominalValue   = NominalValue::pluck('value')->first();
        $waterPaymnetId = WaterPaymentList::pluck('id')->last();
        $total          = floatval(($lastMeter) * $nominalValue);
        DB::statement("INSERT INTO detail_water_payment_lists (water_payment_id, last_meter, current_meter, meter_added_value, total, status, created_at, updated_at) values ($waterPaymnetId, 0, $lastMeter, $lastMeter, $total, 1, '$date', '$date')");

        return $user;
    }
}
