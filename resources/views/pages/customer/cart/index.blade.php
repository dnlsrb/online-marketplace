<x-layouts.customer-show>





    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

        <div class="mx-auto w-full flex-none  xl:max-w-7xl">

            <h1 class="text-2xl mb-5 font-semibold">Shopping Cart</h1>

            <div class="overflow-x-auto bg-white p-1 rounded"  >
                @forelse ($cart->cartProducts as $c_product)
                    <div class="flex   items-center my-2 border-0  border-b p-2 ">
                        <div class="flex flex-row   items-center  "> 
                        <input id="checkbox" type="checkbox"  value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-3 focus:ring-blue-500 focus:ring-2 ">
                             
                        {{-- cart image --}}
                 
                        <img  class=" h-16 h-16 dark:block   " src="{{ $c_product->product->image }}"
                            alt="imac image" />
                        </div>
                    </label>
                        <div class=" sm:flex ms-5 sm:w-full ">
                                          {{-- cart name --}}
                            <a href="{{ route('products.show', ['product' => $c_product->product->id]) }}" class="hover:underline cursor-pointer  sm:basis-1/2   ">
                                {{ $c_product->product->name }}</a>
                   
                                <div class="flex flex-row items-center sm:basis-full sm:w-full "> 
                                            {{-- price --}}
                                    <div class="text-sm items-center font-semibold me-3 text-amber-500 sm:text-xl sm:basis-1/2">
                                        ₱ {{ $c_product->product->price }}
                                    </div>
                                    {{-- quantity --}}
                                    <div class="flex items-center    me-3 sm:basis-1/2">
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
                            
                                </div>
                      
                         
                    </div>
                    <div class="   text-end  text-sm">
                        <form action="">
                            <input type="submit" value="Remove"
                                class="text-red-500 text-xs hover:underline cursor-pointer">
                        </form>
                    </div>  

                    </div>
                @empty

                    <x-shared.empty />
                @endforelse
            </div>
            <div class="bg-white mt-5 p-1 rounded rounded-sm sticky   bottom-0 left-0 z-50 w-full h-36 mb-3  p-3">
            
            
              
                <div class="">
                    <div class="flex justify-between m-2">
                        <div>
                           
                            <input id="checkbox_selectall" type="checkbox" value="yes" x-model="checked"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-1 focus:ring-blue-500 focus:ring-2">
                            
                            <label for="checkbox_selectall">Select all</label>
                            
                               
                            
                        </div>
                       
                    <p class="text-md font-bold sm:text-3xl">Total $384</p>
                  
                    </div>
                    <div class="sm:flex sm:flex-row">
                        
                                                                {{-- total selected product --}}
                    <input type="submit" value="Checkout {{ $c_product->id }}" id=" "
                    class="flex   text-center   text-white bg-amber-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                    focus:outline-none hover:bg-amber-600 sm:order-2">
           
             
                        <a href="{{ route('customer.index') }}"
                        class=" flex justify-center   text-center   text-white bg-gray-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                    focus:outline-none hover:bg-gray-400 sm:order-1  ">
                        Add more
                        </a>
                    </div>
                </div>
 
               

            </div>


        </div>
    </div>
 
    <p class="text-2xl my-10 ">Suggested for you</p>
    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">
        
    @for($i=0; $i < 16; $i++)

        <x-shared.product-card
        link="product/{{$i}}"
        {{-- ^ add link here  --}}
        ratings="{{rand(1, 5)}}"
        imagesrc="https://picsum.photos/id/2{{$i}}/400/400"
        productname="DUMMY DONT CLICK"
        productprice="1{{$i}}0"/>

    @endfor
    </div>

</x-layouts.customer-show>
