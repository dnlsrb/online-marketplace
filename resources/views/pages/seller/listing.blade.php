<x-layouts.seller-index>

    <div class="mb-5">
    <h1 class="text-xl">Listing</h1>
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

<div>
    

<div class="relative overflow-x-auto shadow-md  bg-white p-2">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3  ">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Available Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white    odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="flex  items-center"  x-data="{ open: false}" >
                        <img x-on:click="open = true" class="cursor-pointer  w-11   dark:block  mx-2 " src="https://picsum.photos/id/215/400/400" />

                        <template x-if="open">
                        <div class=" top-0 start-0 flex bg-gray-500/75 fixed flex flex-col   bg-black h-screen w-full" x-on:click="open = false" > 
                            
                            <div class="items-center justify-center flex flex-col h-screen w-full"> 
                                <div class="  w-96 flex justify-end">
                                    <button type="button"  class="text-white   font-medium rounded-lg text-3xl px-5 py-2.5 me-2 mb-2   focus:outline-none">
                                        <i class="fa-solid fa-rectangle-xmark"></i>
                                    </button>
                                    
                                </div>
                                <img  class="  w-80   " src="https://picsum.photos/id/215/400/400" />
                            </div>
                        
                        </div>
                        </template>
                        
                        <div class="flex flex-col">
                        <h1>Apple MacBook Pro 17</h1>
                        <p class="text-gray-200">Laptop</p>
                        </div> 
                    
                    </div>

                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
         
           
        </tbody>
    </table>
</div>

</div>





</x-layouts.seller-index>