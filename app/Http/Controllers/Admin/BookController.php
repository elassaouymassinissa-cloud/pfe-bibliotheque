<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function index()
  {

    $books = Book::all();
    return view('admins.books.index', compact('books'));
  }

  public function create()
  {
    if (Auth::user()->role->name == "User") {
      abort(403, "You have no permission to access this module");
    }
    $categories = Category::all();    // select * from Categories table 
    return view('admins.books.create', compact('categories'));
  }

  public function store(Request $request)
  {
    if (Auth::user()->role->name == "User") {
      abort(403, "You have no permission to access this module");
    }
    $request->validate([
      'title' => ['required', 'unique:books,title'],
      'auther' => ['required'],
      'isbn_number' => ['required'],
      'publish_year' => ['required'],
      'type' => ['required'],
      'available_books' => ['required'],
      'category_id' => ['required'],
      'status' => ['required']
    ]);


    $book = new Book();
    $book->title = $request->title;
    $book->auther = $request->auther;
    $book->isbn_number = $request->isbn_number;
    $book->publish_year = $request->publish_year;
    $book->type = $request->type;
    $book->available_books = $request->available_books;
    $book->category_id = $request->category_id;
    $book->status = $request->status;
    $book->user_id = Auth::user()->id;

    if ($request->has('image')) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('book_images'), $imageName);
      $imageUrl = asset('book_images/' . $imageName);
      $book->book_picture_name = $imageName;
      $book->book_picture_url = $imageUrl;
    }

    $book->save();
    return redirect()->route('admin.books.index')->with('success', 'Book Added Successfully');
  }

  public function delete($id)
  {
    if (Auth::user()->role->name == "User") {
      abort(403, "You have no permission to access this module");
    }
    Book::find($id)->delete();
    return redirect()->route('admin.books.index')->with('success', 'Book Deleted Successfully');
  }

  public function show($id)
  {

    $book = Book::findOrfail($id);
    return view('admins.books.show', compact('book'));
  }

  public function edit($id)
  {
    if (Auth::user()->role->name == "User") {
      abort(403, "You have no permission to access this module");
    }
    $categories = Category::all();    // select * from Categories table 
    $book = Book::findOrFail($id);
    return view('admins.books.edit', compact('book', 'categories'));
  }

  public function update(Request $request)
  {
    if (Auth::user()->role->name == "User") {
      abort(403, "You have no permission to access this module");
    }
    $request->validate([
      'title' => ['required'],
      'auther' => ['required'],
      'isbn_number' => ['required'],
      'publish_year' => ['required'],
      'type' => ['required'],
      'available_books' => ['required'],
      'category_id' => ['required'],
      'status' => ['required']
    ]);
    $book = Book::findOrFail($request->id);
    $book->title = $request->title;
    $book->auther = $request->auther;
    $book->isbn_number = $request->isbn_number;
    $book->publish_year = $request->publish_year;
    $book->available_books = $request->available_books;
    $book->type = $request->type;
    $book->category_id = $request->category_id;
    $book->status = $request->status;

    if ($request->has('image')) {
      $imageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('book_images'), $imageName);
      $imageUrl = asset('book_images/' . $imageName);
      $book->book_picture_name = $imageName;
      $book->book_picture_url = $imageUrl;
    }
    $book->update();
    return redirect()->route('admin.books.index')->with('success', 'Book Updated Successfully!');
  }
}
