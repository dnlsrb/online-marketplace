<x-layouts.admin-index>

   <div class="mb-5">
      <h1 class="text-xl"> <i class="fa-solid fa-table-columns"></i> Dashboard</h1>
       
      </div>
       
        
          {{-- STATISTIC --}}
          <div class="py-3   my-3">
              <div class="grid grid-cols-1 gap-4 md:grid-cols-2   md:gap-6 xl:grid-cols-4 2xl:gap-7.5 divide-x">
                  
                   <!-- Card Item Start -->
              
                    <div class="bg-white m-2 p-3 hover:border-b-black hover:drop-shadow-2xl border-4">
                        <div class="flex flex-row justify-between">
                             
                            <h5 class="text-xl font-bold leading-none text-gray-900  ">Subcribed Sellers </h5> 
                            <a href="{{ route('admin.subscriptions.index') }}" class="me-3 "><i class="fa-solid fa-up-right-from-square"></i></a>
                        </div>
                        
                        
              
                   <div class="grid grid-cols-2 gap-4 rounded-sm   px-7.5 py-6    ">
                 
                      <div class="flex flex-col justify-center items-center"> 
                            <div class="flex items">
                                <i class="fa-solid fa-people-group text-7xl font-bold me-2"></i>   
                            </div>
                       {{--      <h5 class="text-xl font-bold leading-none text-gray-900  ">Subcribed Sellers </h5> --}}
                      </div>
                  
                       
                     <h1 class="text-6xl">{{$subscriptions}}</h1>  
                  </div>
                </div>
                  <!-- Card Item End -->
       
                  
                </div>
          </div>
          {{-- STATISTIC --}}
       
          
          {{-- LATEST CUSTOMERS --}}
      
      
      </div>
      
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
  </x-layouts.admin-index> 
