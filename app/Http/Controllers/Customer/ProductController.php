<?php

namespace App\Http\Controllers\Customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);


        return view('pages.customer.index', compact(['products']));
    }

    public function show(string $id){
        $product = Product::find($id);

        $products = Product::latest()->paginate(11)->where('id', '!=' , $id);

        return view('pages.customer.show', compact(['product', 'products']));
    }

    public function buyNow(string $id) {
        $product = Product::find($id);

        return view('pages.customer.buy-now', compact(['product']));
    }
    public function checkOut(Request $request){
        $cartProducts = json_decode($request->cartProducts);
        $products = $cartProducts->selectProducts;
        

        collect($products)->map(function($product){
            $cartProduct = CartProduct::find($product->id);
           

            Order::create([
                'order_number' => 'ORDR-' . uniqid(),
                'product_id' => $product->product_id,
                'user_id' => $cartProduct->cart->user->id,
                'quantity' => $product->quantity,
                'total' => $product->total,
                'status' => OrderStatus::ORDERED->value
            ]);

            $cartProduct->delete();
        });



        return back()->with(['message_success' => 'Checkout Success']);
    } 

 
}
