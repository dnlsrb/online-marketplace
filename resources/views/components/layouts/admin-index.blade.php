<x-layouts.app>
  <x-admin.nav/>
 
  <x-admin.sidebar/>
  
  <div class="p-4  sm:ml-64">
      {{$slot}}


      <x-admin.footer/>
  </div>
 
</x-layouts.app>
