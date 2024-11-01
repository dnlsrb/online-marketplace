<x-layouts.customer-show>
 
    <div class="sm:flex bg-white p-5 my-4 border">
        <section class="bg-white   flex justify-between w-full">
            <div class=" ">
                <h1 class="text-xl">{{$shop->name}} Shop</h1>
            @php 
            $home= array("Home", "customer.index");
            // home
            $nav = array(
             
            // add more items here in route
            ); 
            $cur = "$shop->name";
            // Current Route
            @endphp
            <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
                </div>


        </section>
    </div>


    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">
    @forelse ($products as $product)
    <x-shared.product-card
     link="{{ route('products.show', ['product' => $product->id]) }}"
        {{-- ^ add link here  --}}
        ratings="{{rand(1, 5)}}"
        imagesrc="{{$product->image}}"
        productname="{{ $product->name}}" 
        productprice="{{ $product->price}}" />
    @empty
    <h1>This user doesn't have a product yet..</h1>
    @endforelse
    </div>

    {{-- PRODUCT REVIEWS --}}
<div class="sm:flex bg-white p-5 my-4">
    <section class="bg-white py-8 antialiased  md:py-16">
      <div class="mx-auto  px-4 2xl:px-0">
        <div class="flex items-center gap-2">
          <h2 class="text-2xl font-semibold text-gray-900  ">Reviews</h2>
  
          <div class="mt-2 flex items-center gap-2 sm:mt-0">
  
  
  
            <p class="text-sm font-medium leading-none text-gray-500  ">(4.6)</p>
            <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline  "> 645 Reviews </a>
          </div>
        </div>
  
  
  
        <div class="mt-6 divide-y divide-gray-200 dark:divide-gray-700">
          <div class="gap-3 pb-6 sm:flex sm:items-start">
            <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
              <div class="flex items-center gap-0.5">
               <x-shared.ratings ratings="5"/>
              </div>
  
              <div class="space-y-0.5">
                <p class="text-base font-semibold text-gray-900  ">Micheal Gough</p>
                <p class="text-sm font-normal text-gray-500  ">November 18 2023 at 15:35</p>
              </div>
  
  
            </div>
  
            <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
              <p class="text-base font-normal text-gray-500  ">My old IMAC was from 2013. This replacement was well needed. Very fast, and the colour matches my office set up perfectly. The display is out of this world and I’m very happy with this purchase.</p>
  
  
            </div>
          </div>
  
  
  
  
  
  
  
  
      </div>
    </section>
  
  
  
  </div>
  
  {{-- PRODUCT REVIEWS --}}
  


</x-layouts.customer-show>