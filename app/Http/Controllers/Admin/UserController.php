<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

        public function index() {
            $users = User::with('role')->get();
            return view('admin.users.list', compact('users'));
        }

        public function create() {
            $roles = Role::all();
            return view('admin.users.add', compact('roles'));
        }

        public function store(Request $request) {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', Rules\Password::defaults()],
            ]);
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
            ]);

            if($user->id > 0) {
                return redirect()->route('admin.user.list')->with('success', 'User Added');
            } else {
                return Redirect::back()->withErrors(['error' => 'Something went Wrong']);
            }
    

        }

        public function edit(Request $request, $id) {
            $roles = Role::all();
            $user = User::find($id);
            return view('admin.users.edit', compact('roles', 'user'));
        }


        public function update(Request $request, $id) {

            $role = User::find($id);
            $role->name = $request->name;
            $role->email = $request->email;
            $role->role_id = $request->role;
            $role->save();

            return redirect()->route('admin.user.list')->with('success', 'User Updated');

        }


        public function delete(Request $request) {  

            $user = User::find($request->id);
            $user->delete();

            return response()->json(['status' => 1, 'message' => 'User Deleted']);
        }

}
