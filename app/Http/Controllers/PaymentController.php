<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\User;


class PaymentController extends Controller
{
  public function showCheckoutForm()
  {
    return view('checkout');
  }

  public function createCheckoutSession(Request $request)
  {
    // dd($request->all());
    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price_data' => [
          'currency' => 'usd',
          'product_data' => [
            'name' => 'Product Name',
          ],
          'unit_amount' => $request->amount * 100, // Amount in cents
        ],
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => route('success', ['id' => $request->bookId]),
      'cancel_url' => route('cancel'),
    ]);

    return response()->json(['id' => $session->id]);
  }

  public function success($id)
  {
    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Increment the borrow limit by 1
    $user->borrow_limit += 1;
    $user->save();
    BorrowedBook::where('id', $id)->update([
      'borrow_date' => null
    ]);
    return view('success');
  }
  public function showPaymentChoice()
  {
    return view('payment.choice'); // Make sure this view exists
  }

  public function cancel()
  {
    return view('cancel');
  }
}
