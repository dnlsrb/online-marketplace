<x-sections.content>
  <div class="grid  grid-cols-2 gap-4 sm:grid-cols-5 md:grid-cols-2 lg:grid-cols-5 "> 

    @for($i=0; $i < 10; $i++)
   
        <x-elements.card/>
 
 
    
    @endfor
 
 
</div>
</x-sections.content>