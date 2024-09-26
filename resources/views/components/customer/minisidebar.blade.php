

<aside id="logo-sidebar" x-transition class="md:hidden fixed top-16 left-0 z-40 w-full h-screen pt-5 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 " aria-label="Sidebar">
    
   <div class="h-full px-3 pb-4  bg-white  ">
      
      <div class="overflow-y-auto bg-white ">
         <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" 
         class="   py-5 flex  items-center justify-between w-full text-gray-900 border-0  focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">
    
            
             
    <p class="text-lg  "><i class="fa-solid fa-filter mx-5"></i> Filter</p> 
            <i class="fa-solid fa-rectangle-xmark mx-5"></i>
         </button>
          
 
  
      <hr class="my-3">
       <x-customer.filter/>
      
    </div>
  </aside>


  



<aside id="search_product" x-transition 
class="   md:hidden fixed top-0 left-0 z-40 w-full   py-3 transition-transform -translate-x-full 
bg-white border-r border-gray-200 md:translate-x-0 " aria-label="Sidebar">
   <div class="flex justify-between"> 
 
   <form action="" class=" flex  flex-1 w-32 relative      w-full md:mx-20">
      @csrf

      <div class="absolute inset-y-0 start-0   items-center ps-3 pointer-events-none w-full  md:flex hidden  ">
          <i class="fa-solid fa-magnifying-glass"></i>
      </div>


      <input type="search" id="default-search"
          class="block w-full mx-2  p-2 sm:p-4 ps-2 md:ps-10 text-sm text-gray-900 border border-gray-300  rounded-sm bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
          placeholder="Product Name" required />
      


 
  <input type="submit" name="submit" value="Search"
  class="  text-white absolute end-2.5 mx-3 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm  px-4 py-2">

  </form>
  <button data-drawer-target="search_product" data-drawer-toggle="search_product" aria-controls="search_product" type="button" 
  class="   py-5 flex  items-center justify-between text-gray-900 border-0  focus:outline-none hover:bg-gray-200 rounded text-base text-xl  md:mt-0">

     <i class="fa-solid fa-rectangle-xmark mx-5"></i>
  </button>

</div>
  </aside>




  
 