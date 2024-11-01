<x-layouts.customer-show>

<x-shared.back/>

  @if (session('message_success'))
  <x-shared.alert alert="success"> {{session('message_success')}}</x-shared.alert>
@endif
<div class=" ">

  {{-- MESSAGE --}}


  <div class="sm:flex   bg-white  p-5">

    <div class="max-w-lg w-full flex justify-center">
    <img class="p-1 rounded-t-lg object-fill   w-full    sm:max-w-96      "   src="{{$product->image}}" alt="product image" />
    </div>
  <section class="py-0  sm:px-10 w-full">
 
    <div class="flex justify-between  ">
      
      <h4 class="text-2xl subpixel-antialiased font-semibold">{{$product->name}}   </h4>

  <a href="{{route('customer.chat.index', ['product_id' => $product->id])}}" class="  text-black bg-gray-100 shadow
  border-0 py-2 px-5 sm:px-8 focus:outline-none hover:bg-gray-300 text-sm sm:text-lg  ">
  <span class=" flex items-center justify-center"><i class="fa-regular fa-message sm:me-2"></i> <span class="hidden sm:block">Chat Now</span></span></a>
    </div>






    @php $fakeratings = rand(1, 5); @endphp
  <x-shared.ratings ratings={{$fakeratings}} />

    <div class="my-5">
    <h4 class="mt-5">Product Description</h4>
    <hr class="my-3">
    <h4>{{$product->description}} </h4>
    </div>
    <h4 class="text-amber-500 text-3xl font-bold">₱{{$product->price}}</h4>



    <form action="/customer/cart/add-to-cart/{{$product->id}}" method="POST">
      @csrf
      <div class="my-5">
      <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900  ">Quantity:</label>
      <div class="relative flex items-center max-w-[8rem]">
          <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="   hover:bg-gray-200 border border-gray-300   p-3 h-11 focus:ring-gray-100   focus:outline-none">
            <i class="fa-solid fa-minus"></i>
          </button>
          <input type="text" name="quantity" data-input-counter-min="1" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
          class="  border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm   block w-full py-2.5   dark:placeholder-gray-400 "
            value="1" required />
          <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="   hover:bg-gray-200 border border-gray-300  p-3 h-11 focus:ring-gray-100   focus:outline-none">
            <i class="fa-solid fa-plus"></i>
          </button>
      </div>
      </div>
      <div class="flex my-5">

        <input type="submit" value="Add to cart" name="submit" class=" px-8 text-amber-900 outline-amber-500 bg-amber-300 outline-2 outline border-0 py-2 px-8 focus:outline-none hover:bg-amber-100 text-sm sm:text-lg me-5">
        <a href={{route('customer.products.buy-now', ['product' => $product->id])}} class="  text-white bg-amber-500 border-0 py-2 px-8 focus:outline-none hover:bg-amber-700 text-sm sm:text-lg me-5">Buy now</a>

      </div>
    </form>

     
<div class="sm:flex bg-white p-5 my-4 border">
  <section class="bg-white   flex justify-between w-full">
    <h2 class="   text-lg font-medium   ">{{$product->user->name}}</h2>
    <a href="{{route('show.shop', $product->user->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" >
      View Shop</a>
  </section>
</div>
  </section>
  </div>
</div>
 

{{-- SELLER --}}
 

{{-- PRODUCT REVIEWS --}}
<div class="sm:flex bg-white p-5 my-4">
  <section class="bg-white py-8 antialiased  md:py-16">
    <div class="mx-auto  px-4 2xl:px-0">
      <div class="flex items-center gap-2">
        <h2 class="text-2xl font-semibold text-gray-900  ">Reviews</h2>

        <div class="mt-2 flex items-center gap-2 sm:mt-0">



          <p class="text-sm font-medium leading-none text-gray-500  ">(4.6)</p>
          <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline  "> 645 Reviews </a>
        </div>
      </div>



      <div class="mt-6 divide-y divide-gray-200 dark:divide-gray-700">
        <div class="gap-3 pb-6 sm:flex sm:items-start">
          <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
            <div class="flex items-center gap-0.5">
             <x-shared.ratings ratings="5"/>
            </div>

            <div class="space-y-0.5">
              <p class="text-base font-semibold text-gray-900  ">Micheal Gough</p>
              <p class="text-sm font-normal text-gray-500  ">November 18 2023 at 15:35</p>
            </div>


          </div>

          <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
            <p class="text-base font-normal text-gray-500  ">My old IMAC was from 2013. This replacement was well needed. Very fast, and the colour matches my office set up perfectly. The display is out of this world and I’m very happy with this purchase.</p>


          </div>
        </div>








    </div>
  </section>



</div>

{{-- PRODUCT REVIEWS --}}


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
