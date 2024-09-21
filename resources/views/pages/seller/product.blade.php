<x-layouts.seller-index>


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
 
@include('partials.add-product-form')


</x-layouts.seller-index>