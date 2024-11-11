<x-layouts.app >
 
<x-notauth.nav />
 
<div class="container mx-auto p-5 bg-white rounded rounded-md"> 
    
<x-shared.back/>
<a href="/"  class=" text-gray-900   md:mb-0 flex sm:hidden items-center font-medium title-font text-2xl">
    <img src="{{ asset('pma_online_marketplace.png') }}" alt="" srcset="" class="w-11 ">
       
      <h1 class="ml-3  text-lg">PMA ONLINE MARKETPLACE</h1>
    </a>
    <hr class="flex sm:hidden my-3">
    @include('partials.subcription-form')
</div>
 
        
    
 
<x-notauth.footer />
</x-layouts.app >
 