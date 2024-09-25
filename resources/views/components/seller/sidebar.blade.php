 

 

{{-- :class="open ? 'w-64 block' : 'sm:w-20 hidden'" --}}
 
<aside   id="logo-sidebar"    x-on:mouseenter="open = true "  x-on:mouseleave="open = false"  x-cloak   :class="open ? 'w-64 block' : 'sm:w-20 hidden'"      class="fixed  w-20 sm:block  top-0 left-0 z-40  h-screen pt-20 transition-transform-translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white  "  >
     <x-admin.menu/>
   </div>
</aside>


