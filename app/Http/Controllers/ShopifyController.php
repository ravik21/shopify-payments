<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

class ShopifyController extends Controller
{
    public function capturePayment(Request $request)
    {
        $transaction = $request->all();

        Payment::updateOrCreate(
          ['transaction_id' => $transaction['id']],
          [
            'email'           => $transaction['email'],
            'total_price'     => $transaction['total_price'],
            'subtotal_price'  => $transaction['subtotal_price'],
            'total_discounts' => $transaction['total_discounts'],
            'total_weight'    => $transaction['total_weight'],
            'total_tax'       => $transaction['total_tax'],
            'currency'        => $transaction['currency'],
            'order_number'    => $transaction['order_number'],
            'customer_id'     => $transaction['customer']['id'],
            'first_name'      => $transaction['customer']['first_name'],
            'last_name'       => $transaction['customer']['last_name'],
            'data'            => json_encode($transaction),
          ]
        );
    }

    public function getTransaction()
    {
        $transactions = Payment::all();
        return view('order.transaction', ['transactions' => $transactions]);
    }
}
