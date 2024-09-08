<x-layouts.customer-index>
    
    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">




        @forelse ($products as $product)
            <x-shared.card
             link="{{ route('products.show', ['product' => $product->id]) }}"
                {{-- ^ add link here  --}}
                ratings="{{rand(1, 5)}}"
                imagesrc="{{$product->image}}"
                productname="{{ $product->name}}" 
                productprice="{{ $product->price}}" />
                
                
               
        @empty

            <h1>No Product Available</h1>
        @endforelse
        {{ $products->links() }}

    </div>
</x-layouts.customer-index>
