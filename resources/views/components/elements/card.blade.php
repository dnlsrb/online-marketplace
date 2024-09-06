
{{--       
 $productname,
 $productprice,
 $image, 
 $link,
        --}}
 

<div class="w-full max-w-sm bg-white border  ">
    <a href="{{$link}}">
        <img class="p-1 rounded-t-lg object-cover" src="{{$imagesrc}}" alt="product image" />
   
    <div class="px-5 pb-5">
       
        <p class="text-sm text-gray-900  truncate">{{ $productname}}</p>
    
        {{-- <h1 class="text-base   tracking-tight text-gray-900 dark:text-white">  The Apple Watch Series 7 GPS is a feature-rich smartwatch designed to enhance your daily life with advanced health and fitness tracking, seamless connectivity, and a sleek, durable design. </h1> --}}
        {{-- <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800  3">5.0</span> --}}

        <div class="flex items-center justify-between">
            <span class="text-md font-bold text-gray-900 ">₱ {{$productprice}}</span>
            
            {{-- <a href="show" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> <i class="fa-solid fa-cart-shopping md:hidden sm:block"></i></a> --}}
        
        </div>
    </div>
</a>
</div>