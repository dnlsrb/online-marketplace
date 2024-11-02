<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\Delivery;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::whereHas('order', function($q){
            $q->whereHas('product', function($q){
                $q->where('user_id', Auth::user()->id);
            });
        })->latest()->paginate(10);


        return view('pages.seller.delivery.index', compact(['deliveries']));
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
        $request->validate([
            'tracking_number',
            'order',
            'courier'
        ]);


        $order = Order::find($request->order);

        Delivery::create([
            'tracking_number' => $request->tracking_number,
            'order_id' => $order->id,
            'courier' => $request->courier
        ]);


        $order->update([
            'status' => OrderStatus::DELIVERY->value
        ]);


        return back()->with([
            'success' => 'Order is On Delivery ' . $request->tracking_number
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $request->validate([
            'tracking_number',
            'order',
            'courier'
        ]);


       $delivery = Delivery::find($id);


        $delivery->update([
            'tracking_number' => $request->tracking_number,
            'courier' => $request->courier
        ]);



        return back()->with([
            'success' => 'Updated '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delivery = Delivery::find($id);

        $delivery->delete();


        return back()->with([
            'success' => 'Delivery Deleted'
        ]);
    }

    public function status(Request $request, string $id){
        $status = $request->status;


        $delivery = Delivery::find($id);

        $delivery->order->update([
            'status' => $request->status
        ]);



        return back()->with(['success' => 'Status Updated ' . $status]);
    }
}
