<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        if(Auth::user()->role->name!="Admin"){
            abort(403, "You have no permission to access this module");
        }
        $roles = Role::all();    // select * from Role table 
        return view('admins.roles.index',compact('roles'));
         }
     
         public function show($id){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
            $role = Role::findOrFail($id);
            return view('admins.roles.show',compact('role'));
         }
     
         public function edit($id){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
             $role = Role::findOrFail($id);
             $roles = Role::all();
             return view('admins.roles.edit',compact('role', 'roles'));
          }
     
          public function update(Request $request){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
            $request->validate([
                'name'=> ['required'],
                'status'=>['required']
             ]);
             $role = Role::findOrFail($request->id);
             $role->name = $request->name;
             $role->status = $request->status;
             $role->update();
             return redirect()->route('admin.roles.index')->with('success', 'Role Updated Successfully!');
            
            }
     
     
         public function create(){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
           
             return view('admins.roles.create');
         }
     
         public function store(Request $request){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
             $request->validate([
                'name'=> ['required', 'unique:roles,name'],
                'status'=>['required']
             ]);
             $role = new Role();
             $role->name = $request->name;
             $role->status = $request->status;
             $role->user_id = Auth::user()->id;
             $role->save();
             return redirect()->route('admin.roles.index')->with('success', 'Role Added Successfully!');
         }
     
         public function delete($id){
            if(Auth::user()->role->name!="Admin"){
                abort(403, "You have no permission to access this module");
            }
             Role::find($id)->delete();
             return redirect()->route('admin.roles.index')->with('success', 'Roles Delete Successfully!');
         }
}
