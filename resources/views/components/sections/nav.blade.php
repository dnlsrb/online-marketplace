
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap    items-center  justify-evenly">
    <a href="/" class="  flex    md:hidden  title-font font-small items-center  text-gray-900  md:mb-0   ">
      <i class="fa-solid fa-shop   "></i>
      </svg>
      <span class="ml-3  ">Online Marketplace</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a href="" class="mr-5 hover:text-gray-900">Account</a>
      <a href="/login" class="mr-5 hover:text-gray-900">Logout</a>
    </nav>
  </div>
</section>
 
 


<header class="text-gray-600 body-font">
  <div class="container mx-auto  flex p-0">
    <a href="/" class=" md:flex hidden  title-font font-medium items-center text-gray-900 mb-4 md:mb-0   ">
      <i class="fa-solid fa-shop  stroke-2 text-2xl"></i>
      </svg>
      <span class="ml-3 text-xl">Online Marketplace</span>
    </a>
    
<div class="md:hidden flex items-center text-center "> 
  <button class=" flex inline-flex items-center  border-0 py-1 px-5 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0"> 
    <i class="fa-solid fa-filter"></i>
  </button>
</div>

    <form action="" class=" flex  flex-1 w-32 relative my-5 mx-0   md:mx-20">
      @csrf

      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none w-full  ">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    
     
        <input type="search" id="default-search" class="block w-full   p-4  ps-10 text-sm text-gray-900 border border-gray-300  rounded-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Name" required />
        <input type="submit" name="submit" value="Search" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm  px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 
     
      
    </form>

      <div class="flex items-center text-center"> 
      <button class=" flex inline-flex items-center  border-0 py-1 px-5 focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0"> 
        <i class="fa-solid fa-cart-shopping"></i>
      </button>
    </div>

  </div>
</header>

 