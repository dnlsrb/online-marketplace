<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Unsubcribe Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once you unsubscribe, your subscription features and access will end.') }}
        </p>
    </header>

    <x-vendor.breeze.danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Unsubcribe') }}</x-vendor.breeze.danger-button>
 
</section>
