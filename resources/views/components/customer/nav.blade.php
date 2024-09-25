<section class=" w-auto    body-font flex justify-center ">
    <div class="container flex flex-wrap   items-center  justify-between p-3">

        <div class="flex">  

        <a href="/" class="flex    text-gray-900  md:flex  items-center title-font font-medium   md:mb-0 stroke-2 sm:text-2xl  ">
            <i class="fa-solid fa-shop  text-gray-900    text-4xl sm:text-2xl"></i>
            </svg>
            <span class="ml-3 sm:block hidden ">Online Marketplace</span>
          </a>
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" 
          class="mx-1 sm:hidden block flex inline-flex items-center text-gray-900 border-0 py-1 px-2  focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
            <i class="fa-solid fa-filter"></i>
         </button>
         <button  data-drawer-target="search_product" data-drawer-toggle="search_product" aria-controls="search_product"  type="button" 
         class="mx-1 sm:hidden block  flex inline-flex items-center text-gray-900 border-0 py-1 px-2 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
            <i class="fa-solid fa-magnifying-glass"></i>
         </button>
         
         
 
        </div>

 

 
        
        <div>   
            <a  href="{{route('customer.cart.index')}}" class="mx-1  flex inline-flex items-center text-gray-900 border-0 py-1 px-2 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
                <i class="fa-solid fa-cart-shopping  "></i>
             </a>
    
            <button  type="button" class="flex inline-flex items-center text-gray-900 border-0 py-1 px-2  focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
            <i class="fa-solid fa-envelope"></i>
         </button> 
        <button type="button"  data-dropdown-toggle="account_dropdown_1" class="  flex inline-flex items-center text-gray-900 border-0 py-1 px-2  focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
            <i class="fa-solid fa-bars"></i>
        </button>


        <div id="account_dropdown_1" class="z-10 hidden bg-white divide-y divide-gray-100 py-2 rounded-sm shadow w-44 ">
            <ul class="py-2 text-sm text-gray-700  " aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="/profile"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Purchase</a>
                </li>
                <li>
                    <a href="{{ route('customer.subscriptions.index') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Subcription</a>
                </li>

                @role('seller')
                    <li>
                        <a href="{{ route('seller.index') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Seller
                            Dashboard</a>
                    </li>
                @endrole

                @role('admin')
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin
                            Dashboard</a>
                    </li>
                @endrole

                <li>
                    
            @if (!Auth::user())
            <a href="{{ route('login') }}" class="  block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Login</a>
        @else
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</button>
            </form>
        @endif
                </li>

            </ul>
        </div>
    </div>
    </div>
</section>

<hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">


<header class="text-gray-600 body-font  mb-5 sm:block hidden">
    <div class="container mx-auto  flex p-0">

     


 

        <form action="" class="w-full flex  flex-1 w-32 relative my-5 mx-2   md:mx-20">
            @csrf

            <div class="absolute inset-y-0 start-0   items-center ps-3 pointer-events-none w-full  md:flex hidden  ">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>


            <input type="search" id="default-search"
                class="block w-full   p-2 sm:p-4 ps-2 md:ps-10 text-sm text-gray-900 border border-gray-300  rounded-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Product Name" required />
            <input type="submit" name="submit" value="Search"
                class="hidden sm:block text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm  px-4 py-2">


        </form>


 


    </div>
</header>



     <x-customer.minisidebar/>

 
 