<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
        
        public function index() {
            $aboutus = Aboutus::first();
            return view('admin.aboutus', compact('aboutus'));
        }


        public function update(Request $request) {
 
            $aboutus = Aboutus::find(1);
            $aboutus->title = $request->title;

          if($request->image1) {  
            $filename1 =  'image1'.time() . '.jpg';
            $filepath1 = public_path('admin/images/');
        
            move_uploaded_file($_FILES['image1']['tmp_name'], $filepath1.$filename1);

            $aboutus->image1 = $filename1;
          } 
            $aboutus->content1 = $request->content1;

          if($request->image2) {  
            $filename2 =  'image2'.time() . '.jpg';
            $filepath2 = public_path('admin/images/');
        
            move_uploaded_file($_FILES['image2']['tmp_name'], $filepath2.$filename2);

            $aboutus->image2 = $filename2;
          }  
            $aboutus->content2 = $request->content2;

          if($request->image3) {  
            $filename3 =  'image3'.time() . '.jpg';
            $filepath3 = public_path('admin/images/');
        
            move_uploaded_file($_FILES['image3']['tmp_name'], $filepath3.$filename3);

            $aboutus->image3 = $filename3;
          }  
            $aboutus->content3 = $request->content3;

            $aboutus->save();

                return redirect()->back()->with('success', 'Aboutus Updated');
          
        }

}
