<x-layouts.seller-index>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'subcription-open')"  value="Buy Subcription" 
    class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"> 
    Add Product
  </button>
    <x-vendor.breeze.modal name="subcription-open" >
            
        @include('partials.add-product-form')
 
    </x-vendor.breeze.modal>
    
  </x-layouts.seller-index> 

