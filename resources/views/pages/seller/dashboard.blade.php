<x-layouts.seller-index>
    
<div class="mb-5">
<h1 class="text-xl"> <i class="fa-solid fa-table-columns"></i> Dashboard</h1>
@php 
$home= array("Home", "seller.index");
// home
$nav = array(
"1" => ["Product", "customer.index"],
// add more items here in route
); 
$cur = "Product Listing";
// Current Route
@endphp
<x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
</div>
 
    <x-shared.alert />
    
    {{-- STATISTIC --}}
    <div class="py-3   my-3">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2   md:gap-6 xl:grid-cols-4 2xl:gap-7.5 divide-x">
            
             <!-- Card Item Start -->
             <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6  dark:bg-gray-800 dark:text-blue-400 ">
                <div class="flex flex-col justify-center items-center"> 
                    <div class="flex items">
                        <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">{{count($orders)}}</h1>
                    </div>
                    <div >
                       Orders
                    </div>
                </div>
            
                 
                
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6  dark:bg-gray-800 dark:text-blue-400 ">
                <div class="flex flex-col justify-center items-center"> 
                    <div class="flex items">
                        <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                    </div>
                    <div >
                        Unique Visitors
                    </div>
                </div>
            
                 
                
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6  dark:bg-gray-800 dark:text-blue-400 ">
                <div class="flex flex-col justify-center items-center"> 
                    <div class="flex items">
                        <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                    </div>
                    <div >
                        Unique Visitors
                    </div>
                </div>
            
                 
                
            </div>
            <!-- Card Item End -->


            <!-- Card Item Start -->
            <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6  dark:bg-gray-800 dark:text-blue-400 ">
                <div class="flex flex-col justify-center items-center"> 
                    <div class="flex ">
                        <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                    </div>
                    <div >
                        Unique Visitors
                    </div>
                </div>
            
                 
                
            </div>
            <!-- Card Item End -->
            
          </div>
    </div>
    {{-- STATISTIC --}}

<div class="flex flex-col md:flex-row w-full ">
    
    {{-- CHART --}}
    <div id="chart" class="flex-1 rounded-sm  py-10  relative overflow-x-auto shadow-md  bg-white p-2 dark:bg-gray-800 dark:text-blue-400  ">
    </div>
    {{-- CHART --}}

    {{-- LATEST CUSTOMERS --}}
    <div class="flex-2 sm:ms-5 rounded-sm  md:mt-0 mt-2 w-full max-w-md p-4 bg-white border border-gray-200  shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Orders</h5>
            <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                View all
            </a>
        </div>
        <div class="flow-root">
                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($orders as $order)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            {{-- <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div> --}}
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                  {{$order->order_number}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$order->user->email}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                ₱ {{$order->total}}
                            </div>
                        </div>
                    </li>    
                    @empty
                        <li>
                            No Orders
                        </li>
                    @endforelse
                    
                    
                </ul>
        </div>
    </div>
    {{-- LATEST CUSTOMERS --}}


</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</x-layouts.seller-index>
