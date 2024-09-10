<x-layouts.customer-index>


<h1>Cart - {{$cart->cart_number}}</h1>

    @forelse ($cart->cartProducts as $c_product)
        <div>
            <img src="{{$c_product->product->image}}" alt="" srcset="">
            {{ $c_product->product->name }}
        </div>
    @empty
        <h1>No Product Item</h1>
    @endforelse





</x-layouts.customer-index>
