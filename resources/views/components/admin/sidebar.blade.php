

  
   <aside  id="logo-sidebar" x-show="!open"     :class="open ? 'block' : 'hidden'"    class="fixed top-0 left-0 z-40 w-20 h-screen hidden sm:block  pt-20 transition-transform-translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 "  >
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white  " >
         <ul class="space-y-2 font-medium   ">
            <li >
               <a href="{{ route('seller.index') }}" class="flex items-center justify-center p-2 text-gray-900 rounded-lg   hover:bg-gray-100   group">
                  <i class="fa-solid fa-chart-pie "></i>
                  
               </a>
            </li>
            <li>
              <button  x-on:click="open = ! open" type="button" class="flex items-center  justify-center w-full p-2  text-xl text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100   " >
                   
                    <i class="  fa-solid fa-cart-shopping"></i>
                    
              </button>
              
           </li>
            
         </ul>
      </div>
      </aside>
    
    



<template  x-if="open"      >
<aside   id="logo-sidebar"      class="fixed   top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform-translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white  "  >
       <ul class="space-y-2 font-medium">
          <li>
             <a href="{{ route('seller.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-gray-100   group">
                <i class="fa-solid fa-chart-pie"></i>
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
            <button  type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100   "  >
                 
               <i class="  fa-solid fa-cart-shopping"></i>
                  <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Products</span>
                 
            </button>
            <ul id="product-dropdown" class=" py-2 space-y-2">
                  <li>
                     <a href="{{ route('seller.add') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100   ">Add Product</a>
                  </li>
                  <li>
                     <a href="{{ route('seller.listing') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100   ">Listing</a>
                  </li>
                 
            </ul>
         </li>
          
       </ul>
    </div>
 </aside>
</template>

 