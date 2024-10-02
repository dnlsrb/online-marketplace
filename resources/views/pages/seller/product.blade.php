<x-layouts.seller-index>
<div class="mb-5">
    <h1 class="text-xl">Add Product</h1>
 
    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
    "1" => ["No Link",  ],
     "2" => ["Have Link", "seller.index"],
    // add more items here in route
    ); 
    $cur = "Add Product";
    // Current Route
    @endphp
 <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
</div>
@include('partials.add-product-form')


</x-layouts.seller-index>