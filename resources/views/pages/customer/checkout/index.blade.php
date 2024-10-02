<x-layouts.customer-show>





    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

        <div class="mx-auto  w-full flex-none  xl:max-w-7xl bg-white   rounded">
            <div class="flex  w-full items-center  bg-white"> 
                <a href="{{route("customer.cart.index")}}"   type="button" 
                class="mx-1  h-full flex items-center p-4 my-5 block border-gray-300 bg-white border hover:bg-gray-200   text-xl ms-3">
                <i class="fa-solid fa-reply"></i>
                </a>   <h1 class="text-2xl  font-semibold h-full flex items-center ms-3">Checkout</h1>
            </div>
            

            <div class="overflow-x-auto bg-white p-1 rounded"  >
                @forelse ($cart->cartProducts as $c_product)
                    <div class="flex   items-center my-2 border-0  border-b p-2 ">
                        <div class="flex flex-row   items-center  "> 
                       
                             
                        {{-- cart image --}}
                 
                        <img  class=" h-16 h-16 dark:block   " src="{{ $c_product->product->image }}"
                            alt="imac image" />
                        </div>
           
                        <div class=" flex flex-col ms-5 w-full   ">
                                          
                            {{-- cart name --}}
                            <h1  class="hover:underline cursor-pointer  sm:basis-1/2   ">
                                {{ $c_product->product->name }}</h1>
                   
                                <div class="flex flex-row justify-between items-center sm:basis-full sm:w-full mt-5 "> 
                                     {{-- price --}}
                                    <div class="text-sm items-center font-semibold me-3 text-amber-500 sm:text-xl sm:basis-1/2">
                                        ₱ {{ $c_product->product->price }}
                                    </div>
                                    {{-- quantity --}}
                                    <p >x{{ $c_product->quantity }}</p> 

                                    {{-- total Price --}}
                                   
                          
                                </div>
                              
                         
                    </div>
                   

                    </div>
                @empty

                    <x-shared.empty />
                @endforelse
            </div>
            <div class="bg-white mt-5 p-1 rounded rounded-sm w-full h-36 mb-3  p-3">

                    <div class="flex justify-end items-center border-0 border-t-2 border-b-2 border-dotted py-5">
                        <h1 class="text-gray-500 me-10">Order Total: </h1>
                        <h1 class="text-amber-500   font-bold text-xl">₱ 253</h1>
                    </div>
                    {{-- checkout here --}}
                    <div class="flex justify-between m-2">
                        Payment Method
                    </div>

            </div>
        </div>

        
    </div>
 
 

</x-layouts.customer-show>
