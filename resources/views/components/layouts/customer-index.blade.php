<x-layouts.app>

    <x-customer.nav />

    <div class="flex  ">
        <x-customer.sidebar />
        <div class="grow w-full ">
            <x-wrapper>
                {{ $slot }}
            </x-wrapper>
        </div>
    </div>
</x-layouts.app>
