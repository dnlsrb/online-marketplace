 <x-layouts.customer-show>




     <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8" x-data="checkOutProducts" x-init="getProductsInitData({{ json_encode($cart->cartProducts()->with('product')->get()) }})">

         <div class="mx-auto w-full flex-none  xl:max-w-7xl">

             <div class="flex  w-full items-center  bg-white">
                 <a href="/" type="button"
                     class="mx-1  h-full flex items-center p-4 my-5 block border-gray-300 bg-white border hover:bg-gray-200   text-xl ms-3">
                     <i class="fa-solid fa-reply"></i>
                 </a>
                 <h1 class="text-2xl  font-semibold h-full flex items-center ms-3">Shopping Cart</h1>
             </div>

             <div class="overflow-x-auto bg-white p-1 rounded relative">
                 <template x-for="cart in cartProducts" :key="cart.id">
                     <div class="flex   items-center my-2 border-0  border-b p-2 ">
                         <div class="flex flex-row   items-center  ">
                             <input id="checkbox" type="checkbox" @change="selectCarProduct(cart, $event)"
                                 class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 me-3 focus:ring-blue-500 focus:ring-2 ">

                             {{-- cart image --}}

                             <img class=" h-16 h-16 dark:block   " :src="cart?.product.image" alt="imac image" />
                         </div>

                         <div class=" sm:flex ms-5 sm:w-full ">
                             {{-- cart name --}}
                             <a href="#" class="hover:underline cursor-pointer  sm:basis-1/2   ">
                                 <span x-text="cart.product.name"></span></a>

                             <div class="flex flex-row items-center sm:basis-full sm:w-full ">
                                 {{-- price --}}
                                 <div
                                     class="text-sm items-center font-semibold me-3 text-amber-500 sm:text-xl sm:basis-1/2">
                                     ₱ <span x-text="cart.total"></span>
                                 </div>
                                 {{-- quantity --}}
                                 <div class="flex items-center    me-3 sm:basis-1/2">


                                     <button type="button" @click="changeQuantity(cart.id, 'minus')"
                                         class=" border-gray-300 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                         <i class="fa-solid fa-minus"></i>
                                     </button>

                                     <input type="text" x-model="cart.quantity" value=" " min="1"
                                         data-input-counter
                                         class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0  "
                                         required readonly />
                                     <button type="button" @click="changeQuantity(cart.id, 'add')"
                                         class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                         <i class="fa-solid fa-plus"></i>
                                     </button>
                                 </div>


                                 <x-vendor.breeze.modal name="`remove-product`" x-ref="`deleteModal-${cart.id}`">
                                     <form method="post" class="p-6">
                                         @csrf
                                         @method('delete')

                                         <h2 class="text-lg font-medium text-gray-900">
                                             {{ __('Remove Product?') }}
                                         </h2>

                                         <p class="mt-1 text-sm text-gray-600">
                                             <span x-text="cart.product.name"></span> Will be remove from your cart.
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
                             </div>


                         </div>
                         <div>

                             <button type="submit"
                                 class="text-white text-xs hover:underline cursor-pointer bg-red-500 p-3 rounded  ">
                                 <i class="fa-solid fa-trash"></i>
                             </button>
                             </form>
                         </div>

                     </div>

                 </template>

                 {{-- <x-shared.empty />   --}}
                 <div class="absolute z-10 backdrop-blur-sm top-0 h-full w-full flex justify-center items-center" x-show="openPayment">
                    <div class="flex flex-col p-5 bg-white rounded-lg shadow-lg shadow-gray-400">
                       <Button @click="closeCheckoutPayment">Cancel</Button>
                    </div>
                 </div>
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
                         <p class="text-md font-bold sm:text-3xl flex-1">Total <span x-text="checkoutData.total"></span>
                         </p>
                         {{-- total selected product --}}
                         <div class="flex flex-col gap-2 w-1/2">
                             <a x-show="!openPayment" @click="openCheckoutPayment"
                                 class="flex justify-center flex-1 text-white bg-amber-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                   focus:outline-none hover:bg-amber-600 sm:order-2">
                                 Checkout  <span x-text="checkoutData.selectProducts.legth ?? 0"></span>
                             </a>

                             <span x-text="errors?.selectProduct" class="text-xs text-red-700"></span>
                         </div>


                         {{-- <a href="{{ route('customer.index') }}"
                        class=" flex justify-center     text-white bg-gray-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4  
                    focus:outline-none hover:bg-gray-400 sm:order-1  ">
                        Add more
                        </a> --}}
                     </div>

                     <div x-show="openPayment" x-ref="buttonsContainer" class="w-full">

                     </div>


                     <form id="FormPaypal" action="{{ route('customer.products.checkout') }}" method="post">
                        @csrf

                        <input type="hidden" name="cartProducts" id="" :value="JSON.stringify(checkoutData)">
                     </form>

                 </div>

             </div>
         </div>
     </div>

     <p class="text-2xl my-10 ">Suggested for you</p>
     <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">

         @for ($i = 0; $i < 16; $i++)
             <x-shared.product-card link="product/{{ $i }}" {{-- ^ add link here  --}}
                 ratings="{{ rand(1, 5) }}" imagesrc="https://picsum.photos/id/2{{ $i }}/400/400"
                 productname="DUMMY DONT CLICK" productprice="1{{ $i }}0" />
         @endfor
     </div>

 </x-layouts.customer-show>
