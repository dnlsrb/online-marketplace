<x-layouts.customer-show>




<section class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
    <div class="mx-auto  w-full flex-none  xl:max-w-7xl bg-white   rounded p-5">
     
        <div class="flex  w-full items-center  bg-white">
            <a href="/" type="button"
                class="mx-1  h-full flex items-center p-4 my-5 block border-gray-300 bg-white border hover:bg-gray-200   text-xl ms-3">
                <i class="fa-solid fa-reply"></i>
            </a>
            <h1 class="text-2xl  font-semibold h-full flex items-center ms-3">Orders</h1>
        </div>
        <form class="max-w-lg  " class="py-5  ">   
 
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-gray-900 ">
                    <i class="fa-solid fa-filter"></i>
                </div>
                <input type="search" id="default-search" class="placeholder:italic block w-full p-4 ps-10 text-sm border-0 bg-transparent mb-3 border-b  " placeholder="Search Order ID"  />
               
            </div>
        </form>
        <h5>Show:  </h5>
        <div class="flex flex-wrap">
            <div class="flex items-center me-4">
                <input id="all-radio" type="radio" value=""  name="All" class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2 focus:ring-2" >
                <label for="all-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">All</label>
            </div>
            <div class="flex items-center me-4">
                <input id="confirmed-radio" type="radio" value=""  name="Confirmed" class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 " >
                <label for="confirmed-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">Confirmed</label>
            </div>
            <div class="flex items-center me-4">
                <input id="inDelivery-radio" type="radio" value=""  name="InDelivery" class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 " >
                <label for="inDelivery-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">In Delivery</label>
            </div>
            <div class="flex items-center me-4">
                <input id="Cancelled-radio" type="radio" value=""  name="Cancelled" class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 " >
                <label for="Cancelled-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">Cancelled</label>
            </div>
        </div>
    <x-shared.table-body :columns="[  'ID', 'PRICE','STATUS', '']">
    
        <tr class="    ">
         
            <th scope="row" class="pe-6 py-4 font-medium   whitespace-nowrap ">
            <h1  >#ASDAWE</h1>
            </th>
            <td>
                ₱2435
            </td>
            <td>
            <span class="bg-blue-600 text-blue-100 px-4 py-1 rounded  flex sm:inline"><i class="fa-solid fa-hourglass-start px-2"></i> Waiting</span>
            {{-- <span class="bg-yellow-600 text-yellow-100 px-4 py-1 rounded  flex sm:inline"><i class="fa-solid fa-truck-fast px-2"></i></i>Delivery</span>
            <span class="bg-red-600 text-red-100 px-4 py-1 rounded flex sm:inline"><i class="fa-solid fa-xmark px-2"></i> Cancelled</span>
            <span class="bg-green-600 text-green-100 px-4 py-1 rounded flex sm:inline"><i class="fa-solid fa-check px-2"></i> Waiting</span> --}}
            </td>
            <td>
                
<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="  font-medium   text-sm px-5 py-2.5 text-center inline-flex items-center  " type="button"> 
    <i class="fa-solid fa-ellipsis"></i>
    </button>
    
    <!-- Dropdown menu -->
    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
        <ul class="py-2 text-sm text-gray-700  " aria-labelledby="dropdownDefaultButton">
          <li>
            <button class="block   py-2 hover:bg-gray-100 w-full text-center"     
            x-data=""    
            x-on:click.prevent="$dispatch('open-modal', 'view-details')">View Details</button>
 
 
     
        
        

          </li>
          <li>
            <a href="#" class="block   py-2 hover:bg-gray-100 w-full text-center ">Cancel Order</a>
          </li>
        
        </ul>
    </div>
  

    <x-vendor.breeze.modal name="view-details"   focusable>
        <div class="p-3">

   
        <h1 class="font-semibold text-lg py-2">Order Details</h1>
        <hr class="my-2">
        <h1  class="font-semibold text-md py-2">Billing & Delivery Information</h1>
        Bonnie Green - +1 234 567 890, San Francisco, California, United States, 3454, Scott Street
        <hr class="my-2">
        <table  class="w-full text-left font-medium text-gray-900   md:table-fixed">
            <tbody>
                <tr>
                <td class="whitespace-nowrap py-4 md:w-[384px]">
                    <div class="flex items-center aspect-square w-10 h-10 shrink-0">
                        <img class="hidden h-auto w-full max-h-full dark:block" src="https://picsum.photos/id/18/400/400" alt="imac image" />
                        <div href="#" class="hover:underline mx-2">Laptop m16-Thin</div>
                    </div>
                </td>
                <td class="text-center"> 1x </td>
                <td>205</td>
                </tr>
            </tbody>
        </table>
        <hr class="my-2">
        <h1 class="font-semibold text-lg py-2">Order Summary</h1>
        <div class="space-y-4">
            <div class="space-y-2">
              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 ">Original price</dt>
                <dd class="text-base font-medium text-gray-900  ">₱6,592.00</dd>
              </dl>
              <dl class="flex items-center justify-between gap-4">
                <dt class="text-gray-500 ">Delivery</dt>
                <dd class="text-base font-medium text-gray-900  ">-₱120.00</dd>
              </dl>
            </div>
        </div>
        <hr class="my-2">
        <dl class="flex items-center justify-between gap-4">
            <dt class="text-gray-500 ">Total</dt>
            <dd class="text-base font-medium text-gray-900  ">₱6,472.00</dd>
          </dl>
        </div>


    </div>
    </x-vendor.breeze.modal>
    
                
            </td>
          
        </tr>
   
        {{-- table data here --}}
    </x-shared.table-body>
    </div>
</section>






</x-layouts.customer-show>
