<x-sections.content-show>

 <div> 
    <img class="p-1 rounded-t-lg object-cover" src="https://picsum.photos/id/2{{$id}}/400/400" alt="product image" />
    <h4>Product Name </h4>
    <h4>Description </h4>
    <h4>Price </h4> 
 

 
 
<x-elements.button space='open-target=target1'  >
  Open
</x-elements.button>

<x-elements.modal  target="target1"  class="p-5 border-md border rounded bg-white">

<div class="m-5 text-end ">
  <x-elements.button space='close-target=target1'  >
    Close
  </x-elements.button>
</div>  
</div>

</x-elements.modal>


{{-- Recommendation --}}
<div class="mt-20">
  <p class="text-2xl my-10 ">Recommendation</p>
  <div class="grid   gap-1   grid-cols-2 sm:grid-cols-5  "> 


    
    @for($i=0; $i < 16; $i++)
   
        <x-elements.card 
        link="show/{{$i}}" 
        {{-- ^ add link here  --}}
        imagesrc="https://picsum.photos/id/2{{$i}}/400/400" 
        productname="Product Name here // Product Name Here //"  
        productprice="1{{$i}}0"/>

    @endfor 
 


  </div>
</div>


 
 

</x-sections.content-show>