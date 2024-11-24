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
                             <input type="checkbox" @change="selectCarProduct(cart, $event)"
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
                                         class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0  "
                                         required readonly />
                                     <button type="button" @click="changeQuantity(cart.id, 'add')"
                                         class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md     hover:bg-gray-200  ">
                                         <i class="fa-solid fa-plus"></i>
                                     </button>
                                 </div>



                             </div>


                         </div>
                         <div class="flex">
                            <form method="post" action="{{route('customer.cart.remove.product')}}"  class="p-6">
                                @csrf
                                <input type="hidden" name="productID" :value="cart.id">

                             <button type="submit"

                                 class="text-white text-xs hover:underline cursor-pointer bg-red-500 p-3 rounded  ">
                                 Remove
                             </button>
                            </form>
                         </div>

                     </div>

                 </template>


                 <div class="absolute z-10 backdrop-blur-sm top-0 h-full w-full flex justify-center items-center"
                     x-show="openPayment">

                 </div>
             </div>
             <div class="bg-white mt-5 p-1 rounded rounded-sm sticky   bottom-0 left-0 z-10 w-full h-26  mb-3  p-3">
                 <p class="text-md font-bold sm:text-3xl flex-1" x-show="!openPayment">Total ₱<span
                         x-text="checkoutData.total"></span>
                 </p>


                 {{-- total selected product --}}
                 <div x-show="!openPayment">
                     <button id="checkbox_selectall" type="checkbox" @click="SelectAll"
                         class="flex items-center justify-center   text-gray-500 bg-gray-200 border-0  p-5 mb-1 sm:mb-0   w-full sm:mb-2
                   hover:bg-gray-500 hover:text-gray-200  ">
                         Select All
                     </button>



                     <a x-show="!openPayment" @click="openCheckoutPayment"
                         class=" flex items-center justify-center  text-white bg-amber-500 border-0 py-2 mb-1 sm:mb-0   w-full sm:mb-4 px-4
                   focus:outline-none hover:bg-amber-600  ">
                         Checkout (<span x-text="checkoutData.selectProducts.length ?? 0"></span>)
                     </a>

                     <span x-text="errors?.selectProduct" class="text-xs text-red-700"></span>
                 </div>



                 <div class="  items-center  " x-show="openPayment">
                     <div class="text-start p-5">
                         <h1>Your order</h1>
                         <hr>




                         <p class="text-md font-bold sm:text-3xl flex-1" x-show="openPayment">Total ₱<span
                                 x-text="checkoutData.total"></span>
                         </p>
                     </div>
                     <div class="     max-w-screen-lg">
                         <div x-ref="buttonsContainer" class="p-5    ">

                         </div>
                         <div class="flex text-center  p-5  shadow-gray-400  " x-show="openPayment">
                             <button @click="closeCheckoutPayment" class="underline underline-offset-1  bg-white">Change
                                 my mind</button>
                         </div>
                     </div>
                 </div>



                 <form id="FormPaypal" action="{{ route('customer.products.checkout') }}" method="post">
                     @csrf
                     <input type="hidden" x-model="JSON.stringify(orderData)" name="orderData">
                     <input type="hidden" name="cartProducts" id="" :value="JSON.stringify(checkoutData)">
                 </form>
             </div>

         </div>
     </div>

     <p class="text-2xl my-10 ">Suggested for you</p>
 {{-- Recommendation --}}
<div class="mt-20">
    <p class="text-2xl my-10 ">Recommendation</p>
    <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  ">



      @forelse ($products as $product)

      <x-shared.product-card
      link="{{ route('products.show', ['product' => $product->id]) }}"
         {{-- ^ add link here  --}}
         ratings="{{rand(1, 5)}}"
         imagesrc="{{$product->image}}"
         productname="{{ $product->name}}"
         productprice="{{ $product->price}}" />


         @empty

         <x-shared.empty/>
           @endforelse



    </div>

 </x-layouts.customer-show>
