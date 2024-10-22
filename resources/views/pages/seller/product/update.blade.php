<x-layouts.seller-index>
    <div class="mb-5">
        <h1 class="text-xl">Edit Product: <span class="underline">{{$product->name}}</span></h1>
     
        @php 
        $home= array("Home", "seller.index");
        // home
        $nav = array(
     
         "2" => ["Product",  ],
         "2" => ["Product Listing", "seller.products.index" ],
        // add more items here in route
        ); 
        $cur = "Edit Product";
        // Current Route
        @endphp
     <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
     @if(session('update_success'))
 
     <div class="my-3 p-4 text-sm rounded-sm text-yellow-500 rounded-lg  border border-yellow-500 bg-white" role="alert">
         <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">  {{ session('update_success') }}</span> 
       </div>
     @endif
     @include('partials.update-product-form')



    </div>








</x-layouts.seller-index>