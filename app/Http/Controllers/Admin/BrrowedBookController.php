<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BorrowedBook;
use App\Models\Book;
use Carbon\Carbon;
use App\Http\Controllers\Admin\UserController;


class BrrowedBookController extends Controller
{
  public function borrowedBook($bookId)
  {


    $isBookExist = BorrowedBook::where('user_id', Auth::user()->id)
      ->where('book_id', $bookId)->count();
    $user = Auth::user();
    if ($isBookExist > 0) {


      return redirect()->back()->with('success', 'tu as déga emprunter ce livre');
    }


    // 1. Count how many books the user has already borrowed
    $borrowedCount = BorrowedBook::where('user_id', $user->id)->count();

    // 2. Define max allowed books
    $maxBooks = 3;

    // 3. If user has reached the limit, redirect to payment
    $borrowedCount = BorrowedBook::where('user_id', $user->id)->count();
    $maxBooks = $user->borrow_limit ?? 3;

    if ($borrowedCount >= $maxBooks) {
      return redirect()->route('payment.choice');
    }


    $book = Book::where('id', $bookId)->first();
    if ($book->available_books <= 0) {
      return redirect()->back()->with('success', 'Livre indisponible');
    }
    $book->available_books = $book->available_books - 1;
    $book->update();


    $borrowedBook = new BorrowedBook();
    $borrowedBook->user_id = Auth::user()->id;
    $borrowedBook->book_id = $bookId;
    $borrowedBook->borrow_date = now();
    $borrowedBook->return_date = Carbon::now()->addDays(15);
    $borrowedBook->save();

    return redirect()->back()->with('success', 'Le livre vous a été attribué. Veuillez le récupérer à la bibliothèque');
  }

  public function returnBook($id)
  {
    if (Auth::check()) {


      if (Auth::user()->role->name == 'User') {
        BorrowedBook::where('user_id', Auth::user()->id)
          ->where('id', $id)
          ->delete();
      } else {
        $book = Book::findOrFail($id);
        $book->available_books = $book->available_books + 1;
        $book->update();

        $userId = session('idUser');
        BorrowedBook::where('user_id', $userId)
          ->where('book_id', $id)
          ->delete();
      }
    }

    return redirect()->back()->with('success', 'Merci d’avoir retourné le livre');
  }
}
