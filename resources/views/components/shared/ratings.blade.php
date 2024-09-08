
<div class="flex items-center">
 
  @if(empty($ratings))
  <p class="  text-sm font-medium text-gray-500 dark:text-gray-400  ">No ratings yet</p>
     
  @else
  @for($i=0; $i < $ratings; $i++)
  <i class="fa-solid fa-star text-amber-400"></i>
  @endfor
  
  @for($i=0; $i <  5 - $ratings  ; $i++)
  <i class="fa-solid fa-star text-neutral-700"></i>
  @endfor

  <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{$ratings}}</p>
  <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 sm:flex hidden">out of</p>
  <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 sm:hidden flex">/</p>
  <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
  @endif

    
    
</div>
    {{-- rand(1, 5) --}}