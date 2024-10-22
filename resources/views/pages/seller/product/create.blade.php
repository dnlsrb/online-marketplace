<x-layouts.seller-index>
<div class="mb-5">
    <h1 class="text-xl">Add Product</h1>
 
    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
 
     "2" => ["Product",  ],
    // add more items here in route
    ); 
    $cur = "Add Product";
    // Current Route
    @endphp
 <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
</div>
@if(session('message_success'))
 
<div class="my-3 p-4 text-sm rounded-sm text-green-500 rounded-lg  border border-green-500 bg-white" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">  {{ session('message_success') }}</span> 
  </div>
@endif
@if ($errors->any())
 
<div class="my-3 p-4 text-sm rounded-sm text-blue-800 rounded-lg text-error border border-error bg-white" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">Error</span> 
  </div>
@endif
@include('partials.add-product-form')


</x-layouts.seller-index>