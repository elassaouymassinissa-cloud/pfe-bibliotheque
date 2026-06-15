<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;


use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('admins.users.index', compact('users'));
  }


















  public function create()
  {
    $roles = Role::all();
    return view('admins.users.create', compact('roles'));
  }

  public function store(Request $request)
  {
    if (Auth::user()->role->name == 'Admin') {
      $request->validate([
        'user_name' => ['required'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'unique:users,email'],
        'password' => ['required'],
        'address' => ['required'],
        'city' => ['required'],
        'cnic_number' => ['required', 'unique:users,cnic_number'],
        'role_id' => ['required'],
        'phone_number' => ['required'],
        'status' => ['required']

      ]);
    } else {
      $request->validate([
        'user_name' => ['required'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required', 'unique:users,email'],
        'password' => ['required'],
        'address' => ['required'],
        'city' => ['required'],
        'cnic_number' => ['required', 'unique:users,cnic_number'],
        'phone_number' => ['required'],
        'status' => ['required']
      ]);
    }
    $user = new User();
    $user->user_name = $request->user_name;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->password =  Hash::make(trim($request->password));
    $user->address = $request->address;
    $user->city = $request->city;
    $user->cnic_number = $request->cnic_number;
    $user->phone_number = $request->phone_number;
    $user->role_id = $request->role_id ?? 3;
    $user->status = $request->status;
    if ($request->has('image')) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('profile_images'), $imageName);
      $imageUrl = asset('profile_images/' . $imageName);
      $user->profile_picture_name = $imageName;
      $user->profile_picture_url = $imageUrl;
    }
    $user->save();
    return redirect()->route('admin.users.index')->with('success', 'User Added Successfully!');
  }


  public function delete($id)
  {
    User::find($id)->delete();
    return redirect()->route('admin.users.index')->with('success', 'User Deleted Successfully!');
  }


  public function show($id)
  {
    $user = User::findOrFail($id);

    session(['idUser' => $id]); //recuperer id de user a show pour le utiliser dans retur livre par admin

    $myBookIds = BorrowedBook::where('user_id', $user->id)->pluck('book_id');
    $books = Book::whereIn('id', $myBookIds)->get();

    return view('admins.users.show', compact('user', 'books'));
  }

  public function edit($id)
  {
    $roles = Role::all();
    $user = User::findOrFail($id);
    $users = User::all();
    return view('admins.users.edit', compact('user', 'users', 'roles'));
  }

  public function update(Request $request)
  {
    if (Auth::user()->role->name == 'Admin') {
      $request->validate([
        'user_name' => ['required'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required'],
        'address' => ['required'],
        'city' => ['required'],
        'cnic_number' => ['required'],
        'role_id' => ['required'],
        'phone_number' => ['required'],
        'status' => ['required']

      ]);
    } else {
      $request->validate([
        'user_name' => ['required'],
        'first_name' => ['required'],
        'last_name' => ['required'],
        'email' => ['required'],
        'address' => ['required'],
        'city' => ['required'],
        'cnic_number' => ['required'],
        'phone_number' => ['required'],
        'status' => ['required']
      ]);
    }

    $user = User::findOrFail($request->id);
    $user->user_name = $request->user_name;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    if (!empty($request->password)) {
      $user->password = Hash::make(trim($request->password));
    }
    $user->address = $request->address;
    $user->city = $request->city;
    $user->cnic_number = $request->cnic_number;
    $user->phone_number = $request->phone_number;
    if (Auth::user()->role->name == 'Admin') {

      $user->role_id = $request->role_id;
    }
    $user->status = $request->status;
    if ($request->has('image')) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('profile_images'), $imageName);
      $imageUrl = asset('profile_images/' . $imageName);
      $user->profile_picture_name = $imageName;
      $user->profile_picture_url = $imageUrl;
    }
    $user->update();
    return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully!');
  }

  public function profile()
  {
    return view('admins.users.profile');
  }

  public function profileUpdate(Request $request)
  {
    $request->validate([
      'user_name' => ['required'],
      'first_name' => ['required'],
      'last_name' => ['required'],
      'email' => ['required'],
      'address' => ['required'],
      'city' => ['required'],
      'cnic_number' => ['required'],
      'phone_number' => ['required',],
    ]);
    $user = Auth::user();
    $user->user_name = $request->user_name;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    if (!empty($request->password)) {
      $user->password = Hash::make(trim($request->password));
    }
    if ($request->has('image')) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('profile_images'), $imageName);
      $imageUrl = asset('profile_images/' . $imageName);
      $user->profile_picture_name = $imageName;
      $user->profile_picture_url = $imageUrl;
    }
    $user->address = $request->address;
    $user->city = $request->city;
    $user->cnic_number = $request->cnic_number;
    $user->phone_number = $request->phone_number;
    $user->save();
    return redirect()->back()->with('success', 'Profile Updated Successfully!');
  }

  public function borrowedBooks()
  {

    $books = BorrowedBook::join('books', 'borrowed_books.book_id', '=', 'books.id')
      ->select('books.*', 'borrowed_books.*')
      ->where('borrowed_books.user_id', Auth::id())
      ->get();
    return view('admins.users.borrowed', compact('books'));
  }
}
