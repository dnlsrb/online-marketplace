<x-app-layout>
   
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   ">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
     </button>
     
<x-layouts.profile-sidebar/>
     
     <div class="p-4 sm:ml-64">
        <div class="py-12 basis-1/2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="mb-5">
                    <h1 class="text-xl">Shop Profile</h1>
                @php 
                $home= array("Profile", "customer.index");
                // home
                $nav = array( 
                
                // add more items here in route
                ); 
                $cur = "Seller";
                // Current Route
                @endphp
                <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
                    </div>


                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('pages.profile.admin.update-profile-information-form')
                    </div>
                </div>
    
               
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('pages.profile.admin.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
     </div>

 
 
</x-app-layout>