<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserListController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $params = [
            "titlePages"    => 'User List',
            "users"         => User::latest()->paginate(5),
        ];

        return view('admin.UserList.index', $params);
    }

    public function update(Request $request, $id) {
        $users = User::findOrFail($id);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request) {
        User::find($request->id)->delete();
        return response()->json(array('success' => true));
    }
}
