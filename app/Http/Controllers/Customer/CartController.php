<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cart = User::find($user->id)->cart;

        if(!$cart){

           $cart = Cart::create([
                'cart_number' => 'CRT' .  uniqid(),
                'user_id' => $user->id
            ]);

        }
        $products = Product::latest()->paginate(10);

        return view('pages.customer.cart.index', compact(['cart', 'products']));
    }

    public function addProduct(string $id, Request $request){
        $user = Auth::user();
        $cart = User::find($user->id)->cart;

        $product = Product::find($id);

        if(!$cart){

           $cart = Cart::create([
                'cart_number' => 'CRT' .  uniqid(),
                'user_id' => $user->id,
            ]);

        }

        // to get total price??
        $total = $request->quantity * $product->price;

        CartProduct::create([
            'product_id' => $product->id,
            'cart_id' => $cart->id,
            'quantity' => $request->quantity,
            'total' => $total,
        ]);


        return back()->with(['message_success' => "Product Added $product->name x$request->quantity Total of ₱$total"]);
    }

    public function removeProduct(Request $request){
        $cartProduct = CartProduct::find($request->productID);

        $cartProduct->delete();


        return back()->with(['message_success', 'Product Remove Success']);
    }
}
