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
{{-- 
    <x-vendor.breeze.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-vendor.breeze.input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-vendor.breeze.text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-vendor.breeze.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-vendor.breeze.secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-vendor.breeze.secondary-button>

                <x-vendor.breeze.danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-vendor.breeze.danger-button>
            </div>
        </form>
    </vendor.breeze.x-modal> --}}
</section>
