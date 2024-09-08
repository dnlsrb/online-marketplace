
{{--       
 $productname,
 $productprice,
 $image, 
 $link,
        --}}
 
   
<a href="{{$link}}" class="w-full max-w-sm bg-white border  ">
   
    <img class="p-1 rounded-t-lg object-cover" src="{{$imagesrc}}" alt="{{$imagesrc}}" />
    <div class="px-5 pb-5">
        <p class="text-sm text-gray-900  truncate">{{ $productname}}</p>
        <x-elements.ratings ratings={{$ratings}} />
        <div class="flex items-center justify-between">
            <span class="text-md font-bold text-gray-900 ">₱ {{$productprice}}</span>
        </div>
    </div>
</a>
 