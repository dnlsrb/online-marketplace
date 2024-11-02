<x-layouts.customer-show>

    <x-shared.back />

    @if (session('message_success'))
    <x-shared.alert alert="success" >{{session('message_success')}} Please check your recent purchases!</x-shared.alert>
       
    @endif

    <div class="sm:flex bg-white p-5 ">
        <div class="w-1/2">
            <img class="p-1 rounded-t-lg object-fill min-w-64 min-h-64" src="{{ $product->image }}" alt="product image"
                class="w-full aspect-square" />
        </div>
        <section class="py-0  sm:px-10 grow flex flex-col gap-2">
            <h4 class="text-2xl subpixel-antialiased font-semibold">{{ $product->name }} </h4>




            <x-shared.ratings :ratings="5" />


            <div class="my-5">
                <h4 class="mt-5">Product Description</h4>
                <hr class="my-3">
                <h4>{{ $product->description }} </h4>
            </div>
          

            <div x-data="paypalGateWayOrder" x-init="getSubscription({{ json_encode($product) }})" class="w-full">
                <form id="FormPaypal" action="{{ route('customer.orders.store') }}" method="POST" class="my-5">
                    <h4 class="text-amber-500 text-3xl font-bold">₱<span x-text="item.amount.value"></span></h4>

                    @csrf

                    <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900  ">Quantity:</label>
                    <div class="relative flex items-center max-w-[8rem]">
                        <button type="button" @click="changeQuantity('minus')" id="decrement-button" data-input-counter-decrement="quantity-input"
                            class="   hover:bg-gray-200 border border-gray-300   p-3 h-11 focus:ring-gray-100   focus:outline-none">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <input type="text" name="quantity" data-input-counter-min="1" id="quantity-input"
                            data-input-counter aria-describedby="helper-text-explanation"
                            class="  border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm   block w-full py-2.5   dark:placeholder-gray-400 "
                            value="1" required />
                        <button type="button" @click="changeQuantity('add')" id="increment-button" data-input-counter-increment="quantity-input"
                            class="   hover:bg-gray-200 border border-gray-300  p-3 h-11 focus:ring-gray-100   focus:outline-none">
                            <i class="fa-solid fa-plus"></i>
                        </button>


                        <input type="hidden" name="productId" value="{{$product->id}}">
                        <input type="hidden" :value="item.amount.value" name="total">
                    </div>
                </form>

                <div x-ref="buttonsContainer">

                </div>
            </div>

        </section>
    </div>








</x-layouts.customer-show>
