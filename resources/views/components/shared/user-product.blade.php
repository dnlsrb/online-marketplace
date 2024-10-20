 
<div class="flex justify-center">
   
  <h1 class="text-gray-400">{{$user}} has placed a product</h1>  
 
</div>
<hr class="my-3">

<div class="flex  justify-end mb-4">
 
 
 
    <div class="flex flex-col  mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
      <div class="flex  items-start"    >
        <img   class="  w-24   dark:block  mx-2 " src="{{$image}}" />

       
        
        <div class="flex flex-col truncate">
        <h1  >{{$name}}</h1>
         <h1>₱{{$price}}</h1>

        </div> 
   
    </div>
    <p class="text-xs text-gray-100 text-end">{{$time}}</p>
    </div>
 
    <img src="{{$profile}}" class="object-cover h-8 w-8 rounded-full" alt="" />
  </div>