<section class="text-gray-600 body-font bg-amber-500 ">
    <div class="container mx-auto flex flex-wrap    items-center  justify-evenly">

        <x-shared.logo class=" md:mb-0   md:hidden  title-font font-small " />


        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <button class="mr-5 hover:text-gray-900 hidden sm:block" data-dropdown-toggle="account_dropdown_md">Account</button>
            <div id="account_dropdown_md" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-sm shadow w-44 ">
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

                </ul>
            </div>

            @if (!Auth::user())
                <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">Login</a>
            @else
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="mr-5 hover:text-gray-900">Logout</button>
                </form>
            @endif
        </nav>
    </div>
</section>




<header class="text-gray-600 body-font  bg-amber-500">
    <div class="container mx-auto  flex p-0">

        <x-shared.logo class=" md:flex hidden items-center title-font font-medium mb-4 md:mb-0 stroke-2 text-2xl" />


        <div class="md:hidden flex items-center text-center ">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="flex inline-flex items-center  border-0 py-1 px-5 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
                <span class="sr-only">Open sidebar</span>
                <i class="fa-solid fa-filter"></i>
             </button>
            
        </div>

        <form action="" class=" flex  flex-1 w-32 relative my-5 mx-2   md:mx-20">
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



        <div class=" items-center text-center hidden sm:flex">
            <a href="{{ route('customer.cart.index') }}"
                class=" inline-flex items-center  mx-2 p-2 py-2.5 rounded-sm hover:text-white text-sm font-medium text-center   hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300   ">
                <i class="fa-solid fa-cart-shopping"></i>
                <span
                    class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold   bg-blue-200 rounded-full">
                    2
                </span>
            </a>
        </div>


    </div>
</header>



 
 
<div class="fixed bottom-0 left-0 z-50 w-full  sm:hidden bg-white border-t border-gray-200   ">
    <div class="grid h-full max-w-lg grid-cols-4 mx-auto font-medium">

        {{-- HOME --}}
        <a href="/" type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:bg-gray-50 dark:hover:bg-gray-800 group">
           
                <i class="fa-solid fa-shop  text-lg h-5 w-5   text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500  "></i>
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Home</span>
        </a>

        {{-- CART --}}
        <a href="{{ route('customer.cart.index') }}" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:bg-gray-50 dark:hover:bg-gray-800 group">
             <i class="fa-solid fa-cart-shopping  text-lg h-5 w-5   text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500  "></i>
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Cart</span>
        </a>


        {{-- NOTIFICATION --}}
        <button type="button" class="inline-flex flex-col items-center justify-center px-5 py-2 hover:bg-gray-50 dark:hover:bg-gray-800  group">
            <i class="fa-solid fa-envelope  text-lg h-5 w-5   text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500 "></i>
            <span class="text-sm text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500">Notification</span>
        </button> 

         {{-- PROFILE --}}
        <div id="account_dropdown_sm" class="z-10 hidden bg-white divide-y divide-gray-100 py-2 rounded-sm shadow w-44 ">
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

            </ul>
        </div>

        <button type="button"  data-dropdown-toggle="account_dropdown_sm" class="inline-flex flex-col py-2 items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
            <i class="fa-solid fa-circle-user  text-lg h-5 w-5   text-gray-500 dark:text-gray-400   dark:group-hover:text-blue-500 "></i>
            <span class="text-sm text-gray-500 dark:text-gray-400 dark:group-hover:text-blue-500">Account</span>
        </button>
    </div>
  </div>
  