
{{--       
 $productname,
 $productprice,
 $image, 
 $link,
        --}}
 
   
<a href="{{$link}}" class="w-full max-w-sm bg-white border  ">
   
   <div class=" border-b    "> 
      <img class="p-1   object-contain   w-full       h-40  sm:h-72  z-40 " src="{{$imagesrc}}" alt="{{$imagesrc}}" />
    
    
    </div>
    <div class="px-5 pb-5">
        <p class="text-sm text-gray-900  truncate">{{ $productname}}</p>
        <x-shared.ratings ratings={{$ratings}} />
        <div class="flex items-center justify-between">
            <span class="text-md font-bold text-gray-900 ">₱ {{$productprice}}</span>
        </div>
    </div>
</a>
 