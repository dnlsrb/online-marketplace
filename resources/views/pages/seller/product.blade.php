<x-layouts.seller-index>


    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
    "1" => ["Volvo", "customer.index"],
    "2" => ["Toyota2", "customer.index"],
 
 
    // add more items here in route
    ); 
    $cur = "Product";
    // Current Route
    @endphp
    <div id="sticky-banner" tabindex="-1" class="    w-full  py-4 bg-gray-50  bg-gray-700 border-gray-600">
 <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
    </div>
<div class="bg-white p-5">
    <h1 class="font-bold">Basic information</h1>
    

</div>



</x-layouts.seller-index>