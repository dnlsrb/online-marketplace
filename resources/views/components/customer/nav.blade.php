
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap    items-center  justify-evenly">
    <x-shared.logo class=" md:mb-0   md:hidden  title-font font-small "/>
    

    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <button class="mr-5 hover:text-gray-900"  data-dropdown-toggle="account_dropdown">Account</button>
      <div id="account_dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-sm shadow w-44 ">
        <ul class="py-2 text-sm text-gray-700  " aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Purchase</a>
          </li>
          <li>
            <a href="{{route('customer.subscriptions.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Subcription</a>
          </li>
          <li>
            <a href="{{route('seller.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seller Dashboard</a>
          </li>

        </ul>
    </div>

      @if(!Auth::user())
      <a href="{{route('login')}}" class="mr-5 hover:text-gray-900">Login</a>
        @else
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button  class="mr-5 hover:text-gray-900">Logout</button>
        </form>
      @endif
    </nav>
  </div>
</section>




<header class="text-gray-600 body-font">
  <div class="container mx-auto  flex p-0">

    <x-shared.logo class=" md:flex hidden  title-font font-medium mb-4 md:mb-0 stroke-2 text-2xl" />


<div class="md:hidden flex items-center text-center ">
  <button class=" flex inline-flex items-center  border-0 py-1 px-5 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
    <i class="fa-solid fa-filter"></i>
  </button>
</div>

    <form action="" class=" flex  flex-1 w-32 relative my-5 mx-0   md:mx-20">
      @csrf

      <div class="absolute inset-y-0 start-0   items-center ps-3 pointer-events-none w-full  md:flex hidden  ">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>


        <input type="search" id="default-search" class="block w-full   p-4  ps-2 md:ps-10 text-sm text-gray-900 border border-gray-300  rounded-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Product Name" required />
        <input type="submit" name="submit" value="Search" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm  px-4 py-2">


    </form>

      <div class="flex items-center text-center">
      <a href="{{route('customer.cart.index')}}" class=" flex inline-flex items-center  border-0 py-1 px-5 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
        <i class="fa-solid fa-cart-shopping"></i>
      </a>
    </div>

  </div>
</header>
