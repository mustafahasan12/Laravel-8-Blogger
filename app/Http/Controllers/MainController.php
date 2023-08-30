<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\DetailModel;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function index() {
        $blogsslide = Blog::with('user', 'category')->where('status', '1')->limit('4')->get();
        $category = Categories::all();
        $blogs = Blog::with('user', 'category')->where('status', '1')->get();
        return view('index', compact('blogsslide', 'category', 'blogs'));
    }

    public function about() {
        $aboutus = Aboutus::first();
        return view('about', compact('aboutus'));
    }

    public function contact() {
        $detail = DetailModel::find(1);
        return view('contact', compact('detail'));
    }


    public function contactusadd(Request $request) {
            
          $contactus = new Contact();
          $contactus->name = $request->name;
          $contactus->email = $request->email;
          $contactus->subject = $request->subject;
          $contactus->message = $request->message;
          $contactus->save();

        if( $contactus->id ) {  
          return response()->json(['status' => '1', 'message' => 'Thank you for contact us']);
        } else {
          return response()->json(['status' => '0', 'message' => 'something went wrong']);
        }  

    }


    public function blogdetail($id) {
        $category = Categories::all();
        $blogsslide = Blog::with('user', 'category')->where('status', '1')->limit('4')->get();
        $blogs = Blog::with('user', 'category')->where('status', '1')->find($id);

        return view('blogdetail', compact('category', 'blogsslide', 'blogs'));
    }

    
    public function logout() {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }


}
