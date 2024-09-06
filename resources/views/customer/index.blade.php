<x-sections.content-index>
  <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  "> 


    
    @for($i=0; $i < 12; $i++)
   
        <x-elements.card 
        link="show" 
        {{-- ^ add link here  --}}
        imagesrc="https://picsum.photos/id/2{{$i}}/400/400" 
        productname="Product Name here // Product Name Here //"  
        productprice="1{{$i}}0"/>

    @endfor 
 


  </div>
</x-sections.content-index>