<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
   $categories = Category::all(); 
   return view('admins.categories.index',compact('categories'));
    }

    public function show($id){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
       $category = Category::findOrFail($id);
       return view('admins.categories.show',compact('category'));
    }

    public function edit($id){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admins.categories.edit',compact('category', 'categories'));
     }

     public function update(Request $request){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        $request->validate([
            'name'=> ['required'],
            'status'=>['required']
        ]);
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id ?? 0;
        $category->status = $request->status;
        $category->update();
        return redirect()->route('admin.categories.index')->with('success', 'Category Updated Successfully!');


     }


    public function create(){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        $categories = Category::all();
        return view('admins.categories.create', compact('categories'));
    }

    public function store(Request $request){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        $request->validate([
            'name'=> ['required', 'unique:categories,name'],
            'status'=>['required']
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id ?? 0;
        $category->status = $request->status;
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->route('admin.categories.index')->with('success', 'Category Added Successfully!');
    }

    public function delete($id){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        Category::find($id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category Delete Successfully!');
    }

    
}
