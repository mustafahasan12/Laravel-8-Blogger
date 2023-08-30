<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

       public function index() {
           $usercount = User::count();
           return view('admin.index', compact('usercount'));
       }   

       
       public function profile() {
           $roles = Role::all();
           return view('admin.profile', compact('roles'));
       }

       public function profileupdate(Request $request, $id) {

            try {
                $role = User::find($id);
                $role->name = $request->name;
                $role->email = $request->email;
                $role->role_id = $request->role;
                $role->save();

                return redirect()->back()->with('success', 'User Updated');
            } catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }  

        }


        public function contactus() {
            $contactus = Contact::all();
            return view('admin.contactus', compact('contactus'));
        }

        public function contactdelete(Request $request) {

                $contact = Contact::find($request->id);
                $contact->delete();

                return response()->json(['status' => '1', 'message', 'Contact deleted']);
       

        }

}
