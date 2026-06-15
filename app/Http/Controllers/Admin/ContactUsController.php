<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
   public function index(){
    $contacts = ContactUS::all();
    return view('admins.contact.index', compact('contacts'));

   }

   public function create(){
    return view('admins.contact.create');
   }

   public function store(Request $request){
      $request->validate([
        'name'=>['required', 'unique:contact_us,name'],
        'email'=>['required', 'unique:contact_us,email'], 
        'contact_number'=>['required', 'unique:contact_us,contact_number'], 
        'subject'=>['required', 'unique:contact_us,subject'], 
        'message'=>['required', 'unique:contact_us,message']
      ]);
    $contacts = new ContactUs();
    $contacts->name = $request->name; 
    $contacts->email = $request->email; 
    $contacts->contact_number = $request->contact_number; 
    $contacts->subject = $request->subject; 
    $contacts->message = $request->message;
    $contacts->save();
    return redirect()->route('admins.contact.index')->with('success', 'Contact Added Successfully');

   }

   public function delete($id){
    ContactUs::find($id)->delete();
    return redirect()->route('admins.contact.index')->with('success', 'Contact Deleted Successfully');
   }

   public function show($id){
    $contact = ContactUs::findOrFail($id);
    return view('admins.contact.show', compact('contact'));

   }

  

}
