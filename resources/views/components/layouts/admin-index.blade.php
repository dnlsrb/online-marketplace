<x-layouts.app>
<div  x-data="{ open: false}"> 
  <span      > 
  <x-admin.nav/>
  <x-admin.sidebar/>
  </span>
  <div    class="p-4  sm:ml-20  "  >
      {{$slot}}


      <x-admin.footer/>
  </div>
</div>
</x-layouts.app>
