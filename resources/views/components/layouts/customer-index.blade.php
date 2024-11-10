<x-layouts.app>

    <x-customer.nav />

    <div class="flex  ">
        {{-- <x-customer.sidebar /> --}}
        <div class="grow w-full ">

            <x-wrapper>
                <div class=" items-center justify-center sm:flex hidden">
                    <x-customer.search/>
                </div>

                {{ $slot }}
            </x-wrapper>
            <x-customer.footer />
        </div>
    </div>

</x-layouts.app>
