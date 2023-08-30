<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    
            public function index() {
                $Categories = Categories::all();
                return view('admin.categories.list', compact('Categories'));
            }

            public function create() {
                return view('admin.categories.add');
            }

            public function store(Request $request) {

                $categories = new Categories();
                $categories->name = $request->name;
                $categories->save();
    
                if($categories->id > 0) {
                    return redirect()->route('admin.categories.list')->with('success', 'Categories Added');   ;
                } else {
                    return Redirect::back()->withErrors(['error' => 'Something went Wrong']);
                }
        
    
            }

            public function edit(Request $request, $id) {
                $categories = Categories::find($id);
                return view('admin.categories.edit', compact('categories'));
            }
    
    
            public function update(Request $request, $id) {
 
                $categories = Categories::find($id);
                $categories->name = $request->name;
                $categories->save();
    
                    return redirect()->route('admin.categories.list')->with('success', 'Categories Updated');
              
            }
    
    
            public function delete(Request $request) {  
  
                $categories = Categories::find($request->id);
                $categories->delete();
    
                return response()->json(['status' => 1, 'message' => 'Categories Deleted']);
            }
    

}
