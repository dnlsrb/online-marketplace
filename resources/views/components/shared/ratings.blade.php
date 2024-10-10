
<div class="flex   justify-start items-start">
 
  @if(empty($ratings))
  <p class="  text-sm font-medium text-gray-500 dark:text-gray-400  ">No ratings yet</p>
 
  @else
  <span class="xl:flex items-center hidden">
  @for($i=0; $i < $ratings; $i++)
  <i class="fa-solid fa-star text-amber-400 "></i>
  @endfor
  
  @for($i=0; $i <  5 - $ratings; $i++)
  <i class="fa-solid fa-star text-neutral-700"></i>
  @endfor
  </span>
  <p class=" text-sm font-medium text-gray-500 dark:text-gray-400 xl:hidden flex">Ratings:</p>
  <p class=" text-sm font-medium text-gray-500 dark:text-gray-400">&nbsp; {{$ratings}}&nbsp;</p>
  <p class=" text-sm font-medium text-gray-500 dark:text-gray-400 ">/</p>
  <p class=" text-sm font-medium text-gray-500 dark:text-gray-400">&nbsp;5</p>
 
  @endif

    
    
</div>
    {{-- rand(1, 5) --}}