<x-sections.content-index>
    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">




        @forelse ($products as $product)
            <x-elements.card link="{{ route('customer.products.show', ['product' => $product->id]) }}"
                {{-- ^ add link here  --}} imagesrc="{{$product->image}}"
                productname="Product Name here // Product Name Here //" productprice="1{{ $$product->price}}0" />

        @empty

            <h1>No Product Available</h1>
        @endforelse


    </div>
</x-sections.content-index>
