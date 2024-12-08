<?php

namespace App\Http\Controllers\Customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderTransaction;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();

        return view('pages.customer.order.index', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $paymentData = json_decode($request->orderData);



        $order = Order::create([
            'order_number' => 'ORDR-' . uniqid(),
            'product_id' => $request->productId,
            'user_id' => Auth::user()->id,
            'quantity' => $request->quantity,
            'size' => $request->sizes,
            'color' => $request->color,
            'total' => $request->total,
            'status' => OrderStatus::ORDERED->value
        ]);

        $transaction = Transaction::create([
            'transaction_reference' => 'TRNSCTN-' . uniqid(),
            'transaction_type' => 'order',
            'payment_type' => 'online payment',
            'payment_reference' => $paymentData->id,
            'amount' => $paymentData->purchase_units[0]->amount->value,
            'currency' => $paymentData->purchase_units[0]->amount->currency_code
        ]);

        OrderTransaction::create([
            'order_id' =>  $order->id,
            'transaction_id' => $transaction->id
        ]);

        return back()->with(['message_success' => 'Order Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function cancelOrder(string $id){
        $order = Order::find($id);


        $order->update([
            'status' => OrderStatus::CANCEL->value
        ]);



        return back()->with(['message' => 'Order Cancel']);

    }

    public function receivedOrder(string $id){
        $order = Order::find($id);


        $order->update([
            'status' => OrderStatus::RECEIVED->value
        ]);

        return back()->with(['message' => 'Order Received']);

    }

    public function reviewOrder(Request $request, string $id){
        $order = Order::find($id);
        $product = $order->product;

        ProductReview::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'rate' => $request->rate,
            'description' => $request->review
        ]);



        return back()->with(['success' => 'order review']);
    }
}
