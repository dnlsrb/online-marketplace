<x-layouts.app  >
  <div  x-data="{ open: false}"> 

  <span     @click.outside="open = false"  > 
  <x-seller.nav/>
  <x-seller.sidebar/>
  </span>

  <div    class="p-4  sm:ml-20  "  >
      {{$slot}}


      <x-seller.footer/>
  </div>
  </div>
</x-layouts.app>
