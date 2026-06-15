<?php
namespace App\Http\Controllers;
use App\Models\Borrowing; // ou BorrowedBook selon ton modèle
use Barryvdh\DomPDF\Facade\Pdf;


/*class BorrowingController extends Controller
{
public function generatePdf($id)
{
    $borrowing = Borrowing::with('user', 'book')->findOrFail($id);

    $pdf = Pdf::loadView('pdf.borrowing', compact('borrowing'));
    return $pdf->download('emprunt_'.$borrowing->id.'.pdf');
}
}*/