<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\OrderTransaction;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::whereHas('OrderTransaction', function($q) {
            $q->whereHas('order', function($q) {
                $q->whereHas('product', function($q) {
                    // Ensure the product belongs to the authenticated seller
                    $q->where('user_id', Auth::user()->id); 
                });
            });
        })
        ->latest() // Sort by the most recent transactions
        ->paginate(10); // Paginate the results
 
        return view('pages.seller.transaction.index', compact('transaction'));
    }
}
