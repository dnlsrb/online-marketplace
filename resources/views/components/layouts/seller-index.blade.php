<x-layouts.app>
  <x-seller.nav/>
 
  <x-seller.sidebar/>
  
  <div class="p-4  sm:ml-64">
      {{$slot}}


      <x-seller.footer/>
  </div>
 
</x-layouts.app>
