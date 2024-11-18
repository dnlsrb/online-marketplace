<?php

namespace App\Http\Controllers\Customer;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\OrderTransaction;

class ProductController extends Controller
{
    public function index(Request $request){

        $search = $request->search;
        $products = Product::withAvg('reviews', 'rate')->latest()->paginate(10);


        if($search){
            $products =  Product::where(function($q) use($search){
                $q->where('name', 'like', '%' . $search . '%');
            })->withAvg('reviews', 'rate')->latest()->paginate(10);
        }
        return view('pages.customer.index', compact(['products']));
    }

    public function show(string $id){
        $product = Product::withAvg('reviews', 'rate')->where('id', $id)->first();

        $products = Product::withAvg('reviews', 'rate')->latest()->paginate(11)->where('id', '!=' , $id);

        return view('pages.customer.show', compact(['product', 'products']));
    }

    public function buyNow(string $id) {
        $product = Product::find($id);

        return view('pages.customer.buy-now', compact(['product']));
    }
    public function checkOut(Request $request){
        $cartProducts = json_decode($request->cartProducts);
        $products = $cartProducts->selectProducts;
     
          $paymentData = json_decode($request->orderData);
 
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

   

      
  


        // 
            $cartProduct->delete();
        });

 
 
        $transaction = Transaction::create([
            'transaction_reference' => 'TRNSCTN-' . uniqid(),
            'transaction_type' => 'order',
            'payment_type' => 'online payment',
            'payment_reference' =>  $paymentData->id,
            'amount' =>  $paymentData->purchase_units[0]->amount->value,
            'currency' =>  $paymentData->purchase_units[0]->amount->currency_code
        ]);

        OrderTransaction::create([
            'order_id' =>  $order->id,
            'transaction_id' => $transaction->id
        ]);

        return back()->with(['message_success' => 'Checkout Success']);
    }


}
