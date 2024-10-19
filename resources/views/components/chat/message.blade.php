<div class="flex flex-row justify-between bg-white h-screen w-full">
  
    <!-- message -->
    <div class="w-full     justify-between h-screen  relative ">
           {{-- HEADER --}}
      <div class="border-b-2 py-4 px-2 flex justify-between">
    

        
          <div class="flex justify-center items-center"> 
              {{-- button  --}}
              <button   aria-controls="logo-sidebar" type="button"
              class="py-2.5 px-5    rounded ">
              <i class="fa-solid fa-arrow-left"></i>
            </button>
            {{-- profile and name --}}
            <img src="https://picsum.photos/id/433/600/600"class="object-cover h-8 w-8 rounded-full"alt=""/>
            <h1 class="font-bold mx-2">Kua Rec</h1>
          </div>


          <button   aria-controls="logo-sidebar" type="button"
          class="py-2.5 px-2    rounded ">
          <i class="fa-solid fa-ellipsis"></i>
          </button>
      </div>
      {{-- HEADER --}}


      {{-- MESSAGES --}}
        <div class="flex flex-col  content-end     ">  
          <div class="  overflow-y-auto  p-5 ">
   
 
  
        {{$slot}}
 
   
          </div>
      </div>
      {{-- MESSAGES --}}
    


       {{-- enter message --}}
          
       <div class="py-5 absolute bottom-0 w-full px-3">
        @include('partials.chat.enter-message')
      </div>
    </div>
</div>
    