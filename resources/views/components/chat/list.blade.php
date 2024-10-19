 <!-- chat list -->
 <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto hidden sm:block   relative">
    {{-- footer --}}
    <div class="absolute bottom-0 w-full  bg-white shadow-inner py-10 px-5">
      <a href="/"
      class="  bg-gray-300 p-5   rounded-xl"><i class="fa-solid fa-right-to-bracket text-lg"></i></a>
    </div>
    
    {{-- end footer --}}
    <!-- search compt -->
    <div class="border-b-2 py-4 px-2">
        @include('partials.chat.search-user')
    </div>
    <!-- end search compt -->
    <!-- user list -->
 
    @include('partials.chat.user-list')
    {{--  user list--}}
        
    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2  ">

        <div class="w-full">
          <div class="text-lg font-semibold">No User Found</div>
        </div>
    </div>
    <!-- end user list -->
  </div>
 
 