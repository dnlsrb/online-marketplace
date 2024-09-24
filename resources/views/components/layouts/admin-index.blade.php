<x-layouts.app>
<div  x-data="{ open: false}"> 
  <span  @click.outside="open = false"     > 
  <x-admin.nav/>
  <x-admin.sidebar/>
  </span>
  <div :class="open ? 'sm:ml-64' : ' sm:ml-20 '"   class="p-4  sm:ml-64"  >
      {{$slot}}


      <x-admin.footer/>
  </div>
</div>
</x-layouts.app>
