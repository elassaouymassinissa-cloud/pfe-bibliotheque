<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\BorrowedBook;


class AdminController extends Controller
{
  public function index()
  {
    $totalBooks = Book::count();
    $totalUsers = User::where('role_id', 3)->count();
    $totalCategories = Category::count();
    $totalBorrowedBooks = BorrowedBook::count();
    $totalAvailableBooks = Book::sum('available_books');  // ou calcul correct selon ta base
    $totalretardBooks = BorrowedBook::where('return_date', '<', now())->count();

    return view('admins.index', compact('totalBooks', 'totalUsers', 'totalCategories', 'totalBorrowedBooks','totalBorrowedBooks','totalAvailableBooks','totalretardBooks'));
  }


  public function borrowedBooks(Request $request)
  {
    $query = User::with('borrowedBooks');

    if ($request->filled('search')) {
      $query->where('user_name', 'like', '%' . $request->search . '%');
    }

    $users = $query->get();

    return view('admins.borrowed.index', compact('users'));
  }
  public function allBorrowedBooks(Request $request)
  {
    $search = $request->input('search');

    $borrowedBooks = BorrowedBook::with(['user', 'book'])
      ->when($search, function ($query, $search) {
        $query->whereHas('user', function ($q) use ($search) {
          $q->where('user_name', 'like', '%' . $search . '%');
        });
      })
      ->get();

    return view('admins.borrowed.index', compact('borrowedBooks'));
  }
}
