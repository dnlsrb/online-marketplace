<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50  ">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="{{route('profile.edit')}}" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100   group">
               
                    <i class="fa-solid fa-user w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900  "></i>
                <span class="ms-3">User Profile</span>
             </a>
          </li>
          @role('seller')
          <li>
            <a href="{{route('profile.seller.edit')}}" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100   group">
              
                   <i class="fa-solid fa-shop w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900  "></i>
               <span class="ms-3">Shop Profile</span>
            </a>
         </li>
         @endrole
          
       </ul>

       <div class="absolute bottom-0  p-5 mb-1 flex flex-row">
        <a href="/" class="flex items-center   text-gray-900 rounded-lg me-2 hover:bg-gray-100 border p-3  group">
               
            <i class="fa-solid fa-user  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900  "></i>
     
        </a>
        @role('seller')
        <a href="{{route('seller.index')}}" class="flex items-center   text-gray-900 rounded-lg me-2 hover:bg-gray-100 border p-3  group">
               
            <i class="fa-solid fa-shop   text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900  "></i>
     
        </a>
        @endrole
       <div class="border-l-2 border-0 px-2 text-end">
        <form action="{{ route('logout') }}"  class="flex items-center  text-gray-900 rounded-lg hover:bg-gray-100 border p-3  group" method="post">
            @csrf
            <button  class="fa-solid fa-door-open  text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900  "></button>
        </form>

       
       </div>
       </div>
    </div>
 </aside>