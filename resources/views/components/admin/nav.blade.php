
<nav class="sticky top-0 z-50 w-full bg-white border-b border-gray-200  ">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
             
          <button x-on:click="open = ! open"   type="button" class="inline-flex items-center p-2    rounded-lg   hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200     ">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>     
       
           <div class="flex items-center  ">
            <a href="/seller/dashboard" class="flex ms-2   text-start">
                
              <x-shared.logo class=" md:mb-0 hidden sm:block font-medium title-font text-2xl" />
              
            </a>
            <h2 class="ml-2 underline underline-offset-2">Admin</h2> 
          </div>
        </div>
        <div class="flex items-center">
            <div class="flex items-center ms-3">
                <button class="mr-5 hover:text-gray-900"  data-dropdown-toggle="account_dropdown">{{Auth::user()->name}}<i class="fa-solid fa-chevron-down"></i></button>
                <div id="account_dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-sm shadow w-44 ">
                  <ul class="py-2 text-sm text-gray-700  " aria-labelledby="dropdownDefaultButton">
                    <li>
                      <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    
                    <li>
                      <a href="{{route('customer.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Go Back to Customer</a>
                    </li>
                    <li>
                      <form action="{{route('logout')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" method="post">
                        @csrf
                        <button  >Logout</button>
                    </form>
                   
                    </li>
                  </ul>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>