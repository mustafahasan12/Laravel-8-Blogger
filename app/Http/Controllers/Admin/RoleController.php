<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
        public function index() {
            $roles = Role::all();
            return view('admin.role.list', compact('roles'));
        }

        public function create() {
            return view('admin.role.add');
        }

        public function store(Request $request) {

            $role = new Role();
            $role->name = $request->name;
            $role->save();

            return redirect()->route('admin.role.list');

        }

        public function edit(Request $request, $id) {
            $role = Role::find($id);
            return view('admin.role.edit', compact('role'));
        }

        public function update(Request $request, $id) {

            $role = Role::find($id);
            $role->name = $request->name;
            $role->save();

            return redirect()->route('admin.role.list');

        }

        public function delete(Request $request) {

            $role = Role::find($request->id);
            $role->delete();

            return response()->json(['status' => 1, 'message' => 'Role Deleted']);
        }

}
