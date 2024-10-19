<x-layouts.user-chat>
      {{-- The User List, Search List and Message Send is in the Global Partial --}}
      {{-- overflow for user list and message still didnt fixed =) --}}

      {{-- no chat in the user --}}
      <x-shared.no-message/>

      {{-- Other user chat --}}
       <x-shared.other-chat message="asdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaweaweeasdaweaw" profile="https://picsum.photos/id/433/600/600" />
  
      {{-- product --}}
      <x-shared.user-chat message="asdaweaweawe" profile="https://picsum.photos/id/433/600/600"/>
 
      {{-- mag aadd pako ng magfoforward ng ui for product na gusto pagusapan ng customer --}}
      {{-- gantong format nlng gawin ko next time excep sa report antok nako e haha --}}
</x-layouts.user-chat>