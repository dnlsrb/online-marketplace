
<header class="text-gray-600 body-font  sm:block hidden w-full">
    

     


 

        <form action="" class="w-full    relative my-5   ">
            @csrf

            <div class="absolute inset-y-0 start-0   items-center ps-3 pointer-events-none w-full  md:flex hidden  ">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>


            <input type="search" id="default-search"
                class="block w-full   p-2 sm:p-4 ps-2 md:ps-10 text-sm text-gray-900 border border-gray-300  rounded-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Product Name" required />
            <input type="submit" name="submit" value="Search"
                class="hidden sm:block text-white absolute end-10 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none
                 focus:ring-blue-300 font-medium rounded-sm text-sm  px-4 py-2">


        </form>


 

 
</header>