 
<x-layouts.customer-show>

 

 
    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">

       
      
        <div class="mx-auto w-full flex-none  xl:max-w-7xl">

            <div class="flex  w-full items-center  bg-white"> 
                <a href="/"   type="button" 
                class="mx-1  h-full flex items-center p-4 my-5 block border-gray-300 bg-white border hover:bg-gray-200   text-xl ms-3">
                <i class="fa-solid fa-reply"></i>
                </a>   <h1 class="text-2xl  font-semibold h-full flex items-center ms-3">Shopping Cart</h1>
            </div>
          
            <div class="overflow-x-auto bg-white p-1 rounded" x-data="{ count: 0 }" >
                @forelse ($cart->cartProducts as $c_product)
                    <div class="flex   items-center my-2 border-0  border-b p-2 ">
                        <div class="flex flex-row   items-center  "> 
                            <input id="checkbox" type="checkbox"  value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-3 focus:ring-blue-500 focus:ring-2 ">
                                
                            {{-- cart image --}}
                    
                            <img  class=" h-16 h-16 dark:block   " src="{{ $c_product->product->image }}"
                                alt="imac image" />
                            </div>
             
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
                                        <div class="flex items-center    me-3 sm:basis-1/2" x-data="{ count: {{ $c_product->quantity }} }">
                                            
                                    

                                            <template x-if="count <= 1">
                                                <button   x-on:click.prevent="$dispatch('open-modal', 'remove-product-{{$c_product->id}}')"
                                                    class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                
                                            </template>
                                            
                                                
                                            <x-vendor.breeze.modal name="remove-product-{{$c_product->id}}">    
                                                <form method="post"  class="p-6">
                                                    @csrf
                                                    @method('delete')
                                        
                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Remove Product?') }}
                                                    </h2>
                                        
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ $c_product->product->name }} Will be remove from your cart.
                                                    </p>
                                        
                                                
                                                    <div class="mt-6 flex justify-end">
                                                        <x-vendor.breeze.secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-vendor.breeze.secondary-button>
                                        
                                                        <x-vendor.breeze.danger-button class="ms-3">
                                                            {{ __('Remove') }}
                                                        </x-vendor.breeze.danger-button>
                                                    </div>
                                                </form>
                                            </x-vendor.breeze.modal>

                                            <template  x-if="count > 1"> 
                                            <button type="button" x-on:click="count = count > 0 ? count-1 : count"
                                                class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </template>
                                            <input type="text" x-model="count"
                                                value=" "  min="1" data-input-counter
                                                class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0  "
                                                required readonly/>
                                            <button type="button"  x-on:click="count++"
                                                class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                        
                                    </div>
                        
                            
                        </div>
                        <div >
                
                                <button type="submit" x-on:click.prevent="$dispatch('open-modal', 'remove-product-{{$c_product->id}}')"
                                    class="text-white text-xs hover:underline cursor-pointer bg-red-500 p-3 rounded  ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>  

                    </div>
                @empty

                    <x-shared.empty />  
                @endforelse
            </div>
            <div class="bg-white mt-5 p-1 rounded rounded-sm sticky   bottom-0 left-0 z-10 w-full h-26  mb-3  p-3">
            
            
              
                <div class="">
                    <div class="flex justify-between m-2">
                        <div>
                           
                            <input id="checkbox_selectall" type="checkbox" value="yes" x-model="checked"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-1 focus:ring-blue-500 focus:ring-2">
                            <label for="checkbox_selectall">Select all</label>
                            
                               
                            
                        </div>
                       
                     
                  
                    </div>
                    <div class="flex-row flex items-center p-3">
                        <p class="text-md font-bold sm:text-3xl flex-1">Total $384</p>
                                                                {{-- total selected product --}}
                    <a href="checkout"  id=" "
                    class="flex justify-center flex-1 text-white bg-amber-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                    focus:outline-none hover:bg-amber-600 sm:order-2">
                    Checkout  <span x-text="status.length"></span>
                    </a>
             
                        {{-- <a href="{{ route('customer.index') }}"
                        class=" flex justify-center     text-white bg-gray-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                    focus:outline-none hover:bg-gray-400 sm:order-1  ">
                        Add more
                        </a> --}}
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
