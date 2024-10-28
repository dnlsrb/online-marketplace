

 <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto hidden sm:block   relative" x-data="chat" x-init="initConversation({{json_encode($conversations)}})">
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

    <a href="#" class="flex flex-row py-4 px-2 justify-center items-center border-b-2  hover:bg-gray-100">

        <div class="w-1/4">
          <img
            src="https://picsum.photos/id/233/600/600"
            class="object-cover h-12 w-12 rounded-full"
            alt=""
          />
        </div>
        <div class="w-full">
          <div class="text-lg font-semibold flex justify-between">Kua Rec<p class="text-xs text-gray-400">(Shop)</p></div>
          <span class="text-gray-500">Pick me at 9:00 Am</span>
        </div>
    </a>

    {{--  user list--}}

    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2  ">

        <div class="w-full">
          <div class="text-lg font-semibold">No User Found</div>
        </div>
    </div>
    <!-- end user list -->
  </div>

