<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->latest()->paginate(10);

        return view('pages.seller.product.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('pages.seller.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);


        $user = Auth::user();


        $imageName = 'PRDCT-' . uniqid() . '.' . $request->image->extension();
        $dir = $request->image->storeAs('/product', $imageName, 'public');


        Product::create([
            'name' => $request->name,
            'image' => asset('/storage/' . $dir),
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'user_id' => $user->id
        ]);



        return back()->with(['message_success' => 'Product Added Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
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
        $product = Product::find($id);

        $product->delete();



    }
}
