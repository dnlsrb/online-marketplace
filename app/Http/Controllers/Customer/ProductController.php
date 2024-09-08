<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);


        return view('pages.customer.index', compact(['products']));
    }

    public function show(string $id){
        $product = Product::find($id);

        return view('pages.customer.show', compact(['product']));
    }
}
