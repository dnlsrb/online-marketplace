<?php

namespace App\Http\Controllers\Seller;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $orders = Order::where(function($q){
            $q->whereHas('product', function($q){
                $q->where('user_id', Auth::user()->id)
                ->where('status', OrderStatus::ORDERED->value);
            });
        })->latest()->get();


        return view('pages.seller.dashboard', compact(['orders']));
    }
}
