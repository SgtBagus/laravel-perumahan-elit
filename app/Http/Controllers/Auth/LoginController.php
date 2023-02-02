<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {
        $role = Auth::user()->role; 

        var_dump($role);

        switch ($role) {
            case 'admin':
                return '/admin';
                break;
        
            default:
                return '/'; 
                break;
        }
    }

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
}
