<?php

 
namespace App\Http\Controllers\Customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function show(string $id){
        Product::where('user_id', $id)->firstOrFail();
        $shop = User::where('id', $id)->first();
        $products = Product::latest()->paginate(11)->where('user_id', $id);

        return view('pages.customer.shop.index', compact(['products', 'shop']));
    }
}
