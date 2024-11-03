<x-layouts.admin-index>

   <div class="mb-5">
      <h1 class="text-xl"> <i class="fa-solid fa-table-columns"></i> Dashboard</h1>
       
      </div>
       
        
          {{-- STATISTIC --}}
          <div class="py-3   my-3">
              <div class="grid grid-cols-1 gap-4 md:grid-cols-2   md:gap-6 xl:grid-cols-4 2xl:gap-7.5 divide-x">
                  
                   <!-- Card Item Start -->
                   <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6    ">
                      <div class="flex flex-col justify-center items-center"> 
                          {{-- <div class="flex items">
                              <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold"></h1>
                          </div>
                          <div >
                             Orders
                          </div> --}}
                      </div>
                  
                       
                      
                  </div>
                  <!-- Card Item End -->
      
                  <!-- Card Item Start -->
                  <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6    ">
                      <div class="flex flex-col justify-center items-center"> 
                          {{-- <div class="flex items">
                              <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                          </div>
                          <div >
                              Unique Visitors
                          </div> --}}
                      </div>
                  
                       
                      
                  </div>
                  <!-- Card Item End -->
      
                  <!-- Card Item Start -->
                  <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6    ">
                      <div class="flex flex-col justify-center items-center"> 
                          {{-- <div class="flex items">
                              <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                          </div>
                          <div >
                              Unique Visitors
                          </div> --}}
                      </div>
                  
                       
                      
                  </div>
                  <!-- Card Item End -->
      
      
                  <!-- Card Item Start -->
                  <div class="grid grid-cols-2 gap-4 rounded-sm  bg-white px-7.5 py-6    ">
                      <div class="flex flex-col justify-center items-center"> 
                          {{-- <div class="flex ">
                              <i class="fa-solid fa-user-secret text-4xl me-2"></i>   <h1 class="text-4xl font-bold">18.7k</h1>
                          </div>
                          <div >
                              Unique Visitors
                          </div> --}}
                      </div>
                  
                       
                      
                  </div>
                  <!-- Card Item End -->
                  
                </div>
          </div>
          {{-- STATISTIC --}}
      
      <div class="flex flex-col md:flex-row w-full ">
           {{-- LATEST CUSTOMERS --}}
           <div class="  rounded-sm  md:mt-0 mt-2 w-full p-4 bg-white border border-gray-200  shadow sm:p-8  ">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900  ">Subcribed Sellers (63)</h5>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    View all
                </a>
            </div>
            <form class="max-w-lg  " class="py-5  ">   
 
               <div class="relative">
                   <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-gray-900 ">
                       <i class="fa-solid fa-filter"></i>
                   </div>
                   <input type="search" id="default-search" class="placeholder:italic block w-full p-4 ps-10 text-sm border-0 bg-transparent mb-3 border-b  " placeholder="Search Seller"  />
                  
               </div>
           </form>
            <x-shared.table-body :columns="['Seller Name', 'Subcribed', 'Months Duration', 'Action']">
               {{-- @foreach ($subscriptions as $subscription) --}}
                   <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                   
                       <td class="px-6 py-4">
                           Lola Nenang
                       </td>
                       <td>
                           Seller
                       </td>
                       <td>
                          35 Months
                       </td>
                    
                       <td>
                           
                       </td>
                   </tr>
               {{-- @endforeach --}}
           </x-shared.table-body>
           </div>
   
       
      
          
          {{-- LATEST CUSTOMERS --}}
      
      
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
  </x-layouts.admin-index> 
