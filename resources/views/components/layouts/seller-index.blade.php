<x-layouts.app  >
  <div  x-data="{ open: false}"> 

  <span  @click.outside="open = false"     > 
  <x-seller.nav/>
  <x-seller.sidebar/>
  </span>

  <div    :class="open ? 'sm:ml-64' : ' sm:ml-20 '"   class="p-4  "    >
      {{$slot}}


      <x-seller.footer/>
  </div>
  </div>
</x-layouts.app>
