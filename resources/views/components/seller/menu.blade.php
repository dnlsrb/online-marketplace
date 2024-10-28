<ul class="space-y-2 font-medium"  >
   <li>
      <a href="{{ route('seller.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-gray-100   group">
         <i class="fa-solid fa-chart-pie text-lg ms-2 me-8"></i>
         <span    :class="open ? 'sm:visible' : 'sm:invisible'" class="me-3">Dashboard</span>
      </a>
   </li>
   <li x-data="{ dropdown: false }">
     <button  type="button"  x-on:click="dropdown = ! dropdown" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100   ">

        <i class="  fa-solid fa-cart-shopping text-lg  ms-2 me-8"></i>
           <span    :class="open ? ' ' : 'sm:invisible'" class="  flex-1 me-3 text-left rtl:text-right whitespace-nowrap">Products</span>
           <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
           </svg>
     </button>
     <ul x-show="dropdown" :class="open ? ' ' : 'sm:invisible'" x-transition class="py-2 space-y-2">
           <li class=" ">
              <a href="{{ route('seller.products.create') }}" class="ps-20 flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100   ">
               Add Product</a>
           </li>
           <li>
              <a href="{{ route('seller.products.index') }}" class="ps-20 flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100   ">
               Listing</a>
           </li>


     </ul>
  </li>

  <li>
    <a href="{{route('seller.orders.index')}}" class="flex items-center p-2 text-gray-900 rounded-lg  relative hover:bg-gray-100   group">
       <i class="fa-solid fa-magnifying-glass-chart text-lg ms-2 me-8  "> </i>



       <span    :class="open ? 'sm:visible' : 'sm:invisible'" class="me-3">Orders</span>
    </a>
 </li>


   <li>
   <a href="{{route('seller.report')}}" class="flex items-center p-2 text-gray-900 rounded-lg  relative hover:bg-gray-100   group">
      <i class="fa-solid fa-magnifying-glass-chart text-lg ms-2 me-8  "> </i>



      <span    :class="open ? 'sm:visible' : 'sm:invisible'" class="me-3">Reports</span>
   </a>
</li>
<hr>

<li>
   <a href="{{route('customer.chat')}}" class="flex items-center p-2 text-gray-900 rounded-lg  relative hover:bg-gray-100   group">
      <i class="fa-solid fa-envelope text-lg ms-2 me-8  "> </i>

      <span :class="open ? 'p-2' : 'p-1'" class="absolute   end-1    bg-error rounded-md text-white text-xs"><span  :class="open ? 'sm:block' : 'sm:hidden'">1</span></span>

      <span    :class="open ? 'sm:visible' : 'sm:invisible'" class="me-3">Message</span>
   </a>
   </li>
</ul>
