<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Additional Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('additional.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-vendor.breeze.input-label for="last_name" :value="__('Last Name')" />
            <x-vendor.breeze.text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->profile->last_name ?? null)" required autofocus autocomplete="last_name" />
            <x-vendor.breeze.input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-vendor.breeze.input-label for="first_name" :value="__('First Name')" />
            <x-vendor.breeze.text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->profile->first_name ?? null)" required autofocus autocomplete="first_name" />
            <x-vendor.breeze.input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>


        <div>
            <x-vendor.breeze.input-label for="contact_no" :value="__('Contact No.')" />
            <x-vendor.breeze.text-input id="contact_no" name="contact_no" type="number" class="mt-1 block w-full" :value="old('contact_no', $user->profile->contact_no ?? null)" required autofocus autocomplete="contact_no" />
            <x-vendor.breeze.input-error class="mt-2" :messages="$errors->get('contact_no')" />
        </div>

        <div>
            <x-vendor.breeze.input-label for="address" :value="__('Address')" />
            <x-vendor.breeze.text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->profile->address ?? null)" required autofocus autocomplete="address" />
            <x-vendor.breeze.input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex items-center gap-4">
            <x-vendor.breeze.primary-button>{{ __('Save') }}</x-vendor.breeze.primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
