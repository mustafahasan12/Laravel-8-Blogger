<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    
        public function index(){
            if( Auth::user()->id == 1 ) {
                $blogs = Blog::with('user', 'category')->get();
            } else {
                $blogs = Blog::with('user', 'category')->where('user_id', Auth::user()->id)->get();
            }
            return view('admin.blogs.list', compact('blogs'));
        }

        public function create() {
            $category = Categories::all();
            return view('admin.blogs.add', compact('category'));
        }


        public function store(Request $request) {

           try { 
    
                $blogs = new Blog;
                $blogs->user_id = Auth::user()->id;
                $blogs->cat_id = $request->cat_id;
                $blogs->title = $request->title;

                $filename =  time() . '.jpg';
                $filepath = public_path('admin/images/blog/');
            
                move_uploaded_file($_FILES['blogimage']['tmp_name'], $filepath.$filename);

                $blogs->image = $filename;
                $blogs->content = $request->content;
                $blogs->publishon = $request->publishon;
                $blogs->status = $request->status;

                $blogs->save();

                return redirect()->route('admin.blog.list')->with('success', 'Blog Added');

           } catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();   
           }    
          
        }


        public function edit($id) {
            $category = Categories::all();
            $blog = Blog::find($id);
            return view('admin.blogs.edit', compact('category', 'blog'));
        }


        public function update(Request $request, $id) {

            try { 
      
                 $blogs = Blog::find($id);
                 $blogs->user_id = Auth::user()->id;
                 $blogs->cat_id = $request->cat_id;
                 $blogs->title = $request->title;
 
               if( $request->blogimage ) {  
                 $filename =  time() . '.jpg';
                 $filepath = public_path('admin/images/blog/');
             
                 move_uploaded_file($_FILES['blogimage']['tmp_name'], $filepath.$filename);
 
                 $blogs->image = $filename;
               }  

                 $blogs->content = $request->content;
                 $blogs->publishon = $request->publishon;
                 $blogs->status = $request->status;
 
                 $blogs->save();
 
                 return redirect()->route('admin.blog.list')->with('success', 'Blog Updated');
 
            } catch(Exception $e) {
                 echo 'Message: ' .$e->getMessage();   
            }    
           
         }


         
         public function delete(Request $request) {  
  
            $categories = Blog::find($request->id);
            $categories->delete();

            return response()->json(['status' => 1, 'message' => 'Blog Deleted']);
        }


}
