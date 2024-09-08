<x-sections.content-show>
  
  
  @if (session('message_success'))
  <x-elements.success :message="session('message_success')" />
@endif

  <div class="sm:flex bg-white p-5 "> 
    <div> 
    <img class="p-1 rounded-t-lg object-fill  " width=600 height=600 src="{{$product->image}}" alt="product image" />
  </div>
  <section class="py-0  sm:px-10">
    <h4 class="text-2xl subpixel-antialiased font-semibold">{{$product->name}}   </h4>
        

 
    @php $fakeratings = rand(1, 5); @endphp
  <x-elements.ratings ratings={{$fakeratings}} />
 
 
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
          <input type="text" name="quantity" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" 
          class="  border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm   block w-full py-2.5   dark:placeholder-gray-400 " 
          placeholder="0"  required />
          <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="   hover:bg-gray-200 border border-gray-300  p-3 h-11 focus:ring-gray-100   focus:outline-none">
            <i class="fa-solid fa-plus"></i>
          </button>
      </div>
      </div>
      <div class="flex my-5">
    
        <input type="submit" value="Add to cart" name="submit" class=" px-8 text-amber-900 outline-amber-500 bg-amber-300 outline-2 outline border-0 py-2 px-8 focus:outline-none hover:bg-amber-100 text-sm sm:text-lg me-5"> 
        <button class="  text-white bg-amber-500 border-0 py-2 px-8 focus:outline-none hover:bg-amber-700 text-sm sm:text-lg me-5">Buy now</button>
      </div>
    </form>

  </section>
  </div>
 
 


{{-- Recommendation --}}
<div class="mt-20">
  <p class="text-2xl my-10 ">Recommendation</p>
  <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  "> 


    
    @for($i=0; $i < 16; $i++)
   
        <x-elements.card 
        link="product/{{$i}}" 
        {{-- ^ add link here  --}}
        ratings="{{rand(1, 5)}}"
        imagesrc="https://picsum.photos/id/2{{$i}}/400/400" 
        productname="Product Name here // Product Name Here //"  
        productprice="1{{$i}}0"/>

    @endfor 
 


  </div>
 


 
 

</x-sections.content-show>