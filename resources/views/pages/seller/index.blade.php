<x-layouts.seller-index>


    @if (Session::has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium"> {{ Session::get('message') }} </span>
        </div>
    @endif
    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'subcription-open')"
        value="Buy Subcription"
        class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
        Add Product
    </button>
    <x-vendor.breeze.modal name="subcription-open">

        @include('partials.add-product-form')

    </x-vendor.breeze.modal>

</x-layouts.seller-index>
