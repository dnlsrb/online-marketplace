<x-layouts.app>

 
 
    <div class="container-fluid h-screen mx-auto  ">
        <div class="flex flex-row justify-between bg-white h-screen"> 
        
          <x-chat.list />

          <x-chat.message>
            {{$slot}}
          </x-chat.message>
        </div>
    </div>
 

</x-layouts.app>
