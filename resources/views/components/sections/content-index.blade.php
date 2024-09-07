<x-main.base>

    <x-sections.nav />

    <div class="flex  ">
        <x-sections.sidebar />
        <div class="grow w-full ">
            <x-sections.wrapper>
                {{ $slot }}
            </x-sections.wrapper>
        </div>
    </div>
</x-main.base>
