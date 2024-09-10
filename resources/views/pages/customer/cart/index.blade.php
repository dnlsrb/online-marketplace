<x-layouts.customer-index>

 

  
 <h1 class="text-3xl">Shopping Cart</h1>


 <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
      <div class="space-y-6">
        @forelse ($cart->cartProducts as $c_product)
 <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm   md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
      <a href="#" class="shrink-0 md:order-1">
        <img class="h-20 w-20 dark:hidden" src="{{$c_product->product->image}}" alt="imac image" />
        <img class="hidden h-20 w-20 dark:block" src="{{$c_product->product->image}}" alt="imac image" />
      </a>

      <label for="counter-input" class="sr-only">Choose quantity:</label>
      <div class="flex items-center justify-between md:order-3 md:justify-end">
        <div class="flex items-center">
            <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                <i class="fa-solid fa-minus"></i>
            </button> 
            <input type="text" id="counter-input" value="{{$c_product->quantity}}"   
            data-input-counter-min="1" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0  "    required />
            <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                <i class="fa-solid fa-plus"></i>
            </button>

        </div>
        <div class="text-end md:order-4 md:w-32">
            <p class="text-base font-bold text-gray-900  ">₱ {{ $c_product->product->price }}</p>
        </div>
      </div>

      <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
        <a href="#" class="text-base font-medium text-gray-900 hover:underline text-truncate "> {{ $c_product->product->name }}</a>

        <div class="flex items-center gap-4">
          <button type="button" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
            </svg>
            Add to Favorites
          </button>

          <button type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
            Remove
          </button>
        </div>
      </div>
    </div>
  </div>

  @empty

  <x-shared.empty/>
@endforelse



      </div>
    </div>
 </div>
 
             
          
      
           


</x-layouts.customer-index>
