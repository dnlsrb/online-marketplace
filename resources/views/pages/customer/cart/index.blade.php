<x-layouts.customer-show>





    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

        <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">

            <h1 class="text-2xl mb-5 font-semibold">Shopping Cart</h1>

            <div class="overflow-x-auto ">
                @forelse ($cart->cartProducts as $c_product)
                    <div class="flex flex-row items-center my-2 border-0 border-b-2 p-2">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-3 focus:ring-blue-500 focus:ring-2">
                        {{-- cart image --}}
                        <img class="hidden h-10 w-10 dark:block basis-8 me-3" src="{{ $c_product->product->image }}"
                            alt="imac image" />
                        {{-- cart name --}}
                        <div class="basis-2/4">
                            <h2 class="hover:underline cursor-pointer text-truncate me-3">
                                {{ $c_product->product->name }}</h2>
                        </div>
                        {{-- quantity --}}
                        <div class="flex items-center basis-1/4 me-3">
                            <button type="button" id="decrement-button-{{ $c_product->id }}"
                                data-input-counter-decrement="counter-input-{{ $c_product->id }}"
                                class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                            <input type="text" id="counter-input-{{ $c_product->id }}"
                                value="{{ $c_product->quantity }}" data-input-counter-min="1" data-input-counter
                                class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0  "
                                required />
                            <button type="button" id="increment-button-{{ $c_product->id }}"
                                data-input-counter-increment="counter-input-{{ $c_product->id }}"
                                class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        {{-- price --}}
                        <div class="basis-1/4 font-semibold me-3">
                            ₱ {{ $c_product->product->price }}
                        </div>
                        {{-- remove --}}
                        <div class="basis-8">
                            <form action="">
                                <input type="submit" value="Remove"
                                    class="text-red-500  hover:underline cursor-pointer">
                            </form>
                        </div>
                    </div>
                @empty

                    <x-shared.empty />
                @endforelse
            </div>
            <div class="bg-white mt-5 p-5 rounded rounded-sm">
                <h1 class="text-xl font-semibold mb-3">Order Summary</h1>
                <div class="flex justify-between  mb-3">
                    <p class="text-md">Original Price</p>
                    <p class="text-md">$384</p>
                </div>
                <hr class="h-px mt-1 mb-3 bg-gray-300 border-1 border   ">
                <div class="flex justify-between  mt-3">
                    <p class="text-md font-bold">Total</p>
                    <p class="text-md">$384</p>
                </div>

                {{-- button --}}

                <div class=" flex flex-col sm:flex-row justify-between mt-5">

                    <a href="{{ route('customer.index') }}"
                        class="
     text-center mt-auto text-white bg-gray-500 border-0 py-2 w-48 px-4 my-4 sm:mx-3   w-full focus:outline-none hover:bg-gray-400 rounded">
                        Continue Shopping
                    </a>

                    <input type="submit" value="Checkout"
                        class="flex   text-center   text-white bg-indigo-500 border-0 py-2 mb-4 sm:mb-0 sm:mx-3 w-full sm:mb-4 px-4  focus:outline-none hover:bg-indigo-600 rounded">
                </div>

            </div>


        </div>
    </div>


    {{-- @forelse ($cart->cartProducts as $c_product)
 <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm   md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
      <a href="#" class="shrink-0 md:order-1">
        <img class="h-20 w-20 dark:hidden" src="{{$c_product->product->image}}" alt="imac image" />
        <img class="hidden h-20 w-20 dark:block" src="{{$c_product->product->image}}" alt="imac image" />
      </a>

      <label for="counter-input" class="sr-only">Choose quantity:</label>
      <div class="flex items-center justify-between md:order-3 md:justify-end">
        <div class="flex items-center">
            <button type="button" id="decrement-button{{$c_product->id}}" data-input-counter-decrement="counter-input" class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
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
@endforelse --}}




</x-layouts.customer-show>
