<x-sections.content>
  <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  "> 

    @for($i=0; $i < 10; $i++)
   
        <x-elements.card/>

    @endfor 
 
    </div>
</x-sections.content>