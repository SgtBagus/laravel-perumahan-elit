<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserListController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $params = [
            "titlePages"    =>  'User List'
        ];

        return view('admin.UserList.index', $params);
    }
}
