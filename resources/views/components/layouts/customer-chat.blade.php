<x-layouts.app>

    <x-customer.nav>  
 
    </x-customer.nav>
 
    
    <x-customer.minisidebar/>
 
    <div class="container mx-auto">
        <x-wrapper>
            {{ $slot }}
        </x-wrapper>
    </div>
    <x-customer.footer />

</x-layouts.app>
