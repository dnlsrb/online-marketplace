<x-layouts.customer-chat>


<!-- This is an example component -->
<div class="    shadow-lg rounded-lg  ">
 
<!-- Chatting -->
<div class="flex flex-row justify-between bg-white ">
  <!-- chat list -->
  <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto hidden sm:block">
    <!-- search compt -->
    <div class="border-b-2 py-4 px-2">
      <input
        type="text"
        placeholder="Search Chat"
        class="py-2 px-2 border-2 border-gray-200 rounded w-full"
      />
    </div>
    <!-- end search compt -->
    <!-- user list -->
    <a href="#" class="flex flex-row py-4 px-2 justify-center items-center border-b-2  ">
        
      <div class="w-1/4">
        <img
          src="https://picsum.photos/id/233/600/600"
          class="object-cover h-12 w-12 rounded-full"
          alt=""
        />
      </div>
      <div class="w-full">
        <div class="text-lg font-semibold">Kua Rec</div>
        <span class="text-gray-500">Pick me at 9:00 Am</span>
      </div>
    </a>
        
    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2  ">
        
    
        <div class="w-full">
          <div class="text-lg font-semibold">No User Found</div>
        </div>
      </div>
    <!-- end user list -->
  </div>
  <!-- end chat list -->
  <!-- message -->
  <div class="w-full px-5 flex flex-col justify-between">
    <div class="border-b-2 py-4 px-2 flex justify-between">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
        class="py-2.5 px-2    rounded ">
        <i class="fa-solid fa-arrow-left"></i>
       </button>
       <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
       class="py-2.5 px-2    rounded ">
       <i class="fa-solid fa-ellipsis"></i>
      </button>
      </div>
    <div class="flex flex-col mt-5  overflow-y-auto  max-h-[40rem]">  
    <div class="  "   >

   {{-- If No Message --}}
    <div class="my-5 p-4 text-sm rounded-sm text-blue-800 rounded-lg text-gray border border-gray bg-white" role="alert">
        <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">No Message found</span> 
    </div>
      
 

    {{-- Your chat --}}
    <x-shared.user-chat message="awawdawefawea" profile="https://picsum.photos/id/233/600/600" />
  
     {{-- Other user chat --}}
     <x-shared.other-chat message="asdaweaweaweea" profile="https://picsum.photos/id/433/600/600" />


    {{-- Your chat --}}
    <x-shared.user-chat message="awawdawefawea" profile="https://picsum.photos/id/233/600/600" />
  
    </div>
     {{-- enter message --}}
     <div class="py-5">
        <input
          class="w-full bg-gray-300 py-5 px-3 rounded-xl"
          type="text"
          placeholder="type your message here..."
        />
      </div>
  </div>
  
</div>
</div>

</x-layouts.customer-chat>