<div class="flex justify-start mb-4">
    <img
      src="{{$profile}}"
      class="object-cover h-8 w-8 rounded-full"
      alt=""
    />
    <div  class=" p-3  break-all ml-2  px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl  text-white  sm:max-w-[50%] "  >
        {{$slot}}
     <p class="text-xs text-gray-100 text-start">
        {{$time}}
    </p>
    </div>
  </div>

