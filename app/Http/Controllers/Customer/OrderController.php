<?php

namespace App\Http\Controllers\Customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $order = Order::create([
            'order_number' => 'ORDR-' . uniqid(),
            'product_id' => $request->productId,
            'user_id' => Auth::user()->id,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'status' => OrderStatus::ORDERED->value
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
}
