<x-layouts.user-chat>
      {{-- The User List, Search List and Message Send is in the Global Partial --}}
      {{-- overflow for user list and message still didnt fixed =) --}}

      {{-- no chat in the user --}}
      <x-shared.no-message/>

      {{-- time chat --}}
      <x-shared.time-chat time="5:09 PM"/>

      
      {{-- Other user chat --}}
       <x-shared.other-chat
      message="asdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaw" 
      time="5:09 PM"
      profile="https://picsum.photos/id/433/600/600" />
  
      {{-- product --}}
      <x-shared.user-chat 
      message="asdaweaweawe" 
      profile="https://picsum.photos/id/433/600/600"
      time="5:09 PM"
      />
      

      {{--  --}}
      <x-shared.user-product 
      user="You"
       time="5:09 PM"
       name="asdaweaweawe" 
       image="https://picsum.photos/id/433/600/600" 
       price="32" 
       profile="https://picsum.photos/id/433/600/600"/>
 
</x-layouts.user-chat>