<x-main.base>

    <x-sections.nav />

    <div class="container mx-auto">
        <x-sections.wrapper>
            {{ $slot }}
        </x-sections.wrapper>
    </div>
    <x-sections.footer />

</x-main.base>
