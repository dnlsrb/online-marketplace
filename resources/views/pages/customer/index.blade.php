<x-layouts.customer-index>
   
    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 ">




        @forelse ($products as $product)
            <x-shared.product-card
             link="{{ route('products.show', ['product' => $product->id]) }}"
                {{-- ^ add link here  --}}
                ratings="{{rand(1, 5)}}"
                imagesrc="{{$product->image}}"
                productname="{{ $product->name}}" 
                productprice="{{ $product->price}}" />
               
        @empty

      <x-shared.empty/>
        @endforelse
    
    </div>
    <div class="  mt-3 "> 
        {{ $products->links() }}
        </div>
</x-layouts.customer-index>
