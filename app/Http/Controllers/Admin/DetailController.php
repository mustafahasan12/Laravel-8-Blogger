<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailModel;
use Illuminate\Http\Request;

class DetailController extends Controller
{
       
        public function index() {
            $detail = DetailModel::find(1);
            return view('admin.detail', compact('detail'));
        }


        public function update(Request $request) {
 
            $detail = DetailModel::find(1);
            $detail->address = $request->address;
            $detail->phone_no = $request->phone_no;
            $detail->email = $request->email;
            $detail->copyright = $request->copyright;
            $detail->twitter_link = $request->twitter_link;
            $detail->facebook_link = $request->facebook_link;
            $detail->instagram_link = $request->instagram_link;
            $detail->skype_link = $request->skype_link;
            $detail->linkedin_link = $request->linkedin_link;
            $detail->save();

                return redirect()->back()->with('success', 'Detail Updated');
          
        }
     
}
