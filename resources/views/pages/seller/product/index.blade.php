<x-layouts.seller-index>

    <div class="mb-5">
    <h1 class="text-xl">Listing</h1>
@php 
$home= array("Home", "seller.index");
// home
$nav = array(
"1" => ["Product", ],
// add more items here in route
); 
$cur = "Product Listing";
// Current Route
@endphp
<x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
    </div>
 
    @if(session('alert'))
 
    <div class="my-3 p-4 text-sm rounded-sm text-blue-500 rounded-lg  border border-blue-500 bg-white" role="alert">
        <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">  {{ session('alert') }}</span> 
      </div>
    @endif
<div class="relative overflow-x-auto   bg-white sm:p-8 p-3">
    {{-- <div class="flex items-center justify-start gap-3 mb-4">
        <h5 class="text-xl font-bold leading-none text-gray-700   ">All Products: <span class="text-gray-900">63</span> </h5>
        <h5 class="text-xl font-bold leading-none text-gray-700   ">Total Sales: <span class="text-gray-900">₱2405</span></h5>
       
    </div> --}}
    <form class="max-w-lg  " class="py-5  ">   
 
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-gray-900 ">
                <i class="fa-solid fa-filter"></i>
            </div>
            <input type="search" id="default-search" class="placeholder:italic block w-full p-4 ps-10 text-sm border-0 bg-transparent mb-3 border-b  " placeholder="Search Product"  />
           
        </div>
    </form>
    <x-shared.table-body :columns="['', ' ', 'Item Listing', 'Category','Ratings', 'Price']">
        @forelse ($products as $product)
        <tr class="    ">
            <td>
                <div class="flex items-center">
                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2  ">
                  
                </div>

            </td>
            <td>
                <a href="{{route('seller.products.edit', $product->id)}}" class=" py-1  px-2 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700   ">
                    <i class="fa-solid fa-pencil"></i>
                </a>
            </td>
            <th scope="row" class="pe-6 py-4 font-medium   whitespace-nowrap ">
                <div class="flex  items-center"  x-data="{ open: false}"  >
                    <img x-on:click="open = true" class="cursor-pointer  w-11   dark:block  mx-2 " src="{{$product->image}}" />

                    <template x-if="open">
                    <div class=" top-0 start-0 flex bg-gray-500/75 fixed flex flex-col   bg-black h-screen w-full z-50" x-on:click="open = false" > 
                        
                        <div class="items-center justify-center flex flex-col h-screen w-full"> 
                            <div class="  w-96 flex justify-end">
                                <button type="button"  class="text-white   font-medium rounded-lg text-3xl px-5 py-2.5 me-2 mb-2   focus:outline-none">
                                    <i class="fa-solid fa-rectangle-xmark"></i>
                                </button>
                                
                            </div>
                            <img  class="  w-80   " src="{{$product->image}}" />
                        </div>
                    
                    </div>
                    </template>
                    
                    <div class="flex flex-col truncate">
                    <h1  >{{$product->name}}</h1>
                     
                    </div> 
                
                </div>

            </th>
            <td  >
                {{$product->type}}
            </td>
            <td>

                <x-shared.ratings ratings="{{ $product->reviews_avg_rate}}"/>
            </td>
            <td>
            {{$product->price}}
            </td>
          
            {{-- <td class="pe-6 py-4 ">
                $2999
            </td>
            <td class="pe-6 py-4 ">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300   rounded-full peer   peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all   peer-checked:bg-blue-600"></div>
        
                  </label>
            </td> --}}
        </tr>
        @empty
            <tr>
                No products
            </tr>
        @endforelse
        {{-- table data here --}}
    </x-shared.table-body>
    <div class="flex justify-between flex-col   "> 
        {{ $products->links() }}
        </div>
   
</div>

 





</x-layouts.seller-index>