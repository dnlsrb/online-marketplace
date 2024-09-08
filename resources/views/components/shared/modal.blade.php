 

<div  id="{{$target}}"  class="fixed inset-0 z-0 w-screen overflow-y-auto modal hidden  "   >
<div   class="flex min-h-full items-end justify-center p-4  sm:items-center sm:p-0 ">
 
   <div   class="w-full max-w-sm  z-40 {{$class}}"> 
      
        {{$slot}}
  
    </div>

</div>
</div>


{{-- 
VIEW
 
 
<x-elements.button space='open-target=target1'  >
  Open
</x-elements.button>

<x-elements.modal  target="target1"  class="p-5 border-md border rounded">

<div class="m-5 text-end ">
  <x-elements.button space='close-target=target1'  >
    Close
  </x-elements.button>
</div>  
 
</x-elements.modal>


--}}