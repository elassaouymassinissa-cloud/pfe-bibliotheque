<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BorrowedBook;
use PDF;

class ReportController extends Controller
{
    public function showForm()
    {
        return view('report.form');
    }

    public function generatePDF(Request $request)
    {
        $request->validate(['username' => 'required|string']);

        $user = User::where('user_name', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Utilisateur non trouvé.');
        }

        $borrowedBooks = BorrowedBook::with('book')
                            ->where('user_id', $user->id)
                            ->get();

        $pdf = PDF::loadView('report.pdf', [
            'user' => $user,
            'borrowedBooks' => $borrowedBooks,
        ]);

        return $pdf->download("rapport_{$user->user_name}.pdf");
    }
}
