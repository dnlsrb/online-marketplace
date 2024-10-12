<div class="bg-white p-5">
    <h1 class="font-bold">Basic information</h1>



    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-10">

            <div class="mb-4" x-data="{
                name: '',
                limit: $el.dataset.limit,
                get remaining() {
                    return this.limit - this.name.length
                }
            }" data-limit="120">
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name  @if ($errors->has('name')) <span class="text-xs text-error">({{ $errors->first('name') }})</span> @endif</label>
                </label>
                <input type="text" x-model="name" maxlength="120" id="product-name" name="name"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter product name">
                <label class="text-gray-400"> <span x-text="remaining"></span>/120</label>

       
            </div>

            <div class="    mb-4"  >
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Price @if ($errors->has('price')) <span class="text-xs text-error">({{ $errors->first('price') }})</span> @endif
                    </label>
                <input type="number" x-model="name" maxlength="120" id="product-name" name="price"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter price amount">
        
              
            </div>


            <div class="mb-4" x-data="{
                description: '',
                limit: $el.dataset.limit,
                get remaining() {
                    return this.limit - this.description.length
                }
            }" data-limit="2000">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Product
                    Description @if ($errors->has('description')) <span class="text-xs text-error">({{ $errors->first('description') }})</span>@endif</label>
                <textarea id="description" x-model="description" maxlength="2000" name="description"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3" placeholder="Enter product description"></textarea>
                <label class="text-gray-400"> <span x-text="remaining"></span>/2000</label>
                 
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image
                    @if ($errors->has('image')) <span class="text-xs text-error">({{ $errors->first('image') }})</span>@endif

                </label>
                <div x-data="{ src: '' }" class="flex flex-col  items-start">



                    <label for="dropzone-file" id="label"
                        class="flex flex-col items-center justify-center  min-w-56 min-h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  0">

                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <template x-if="src">
                                <img :src="src" class="w-60 " alt>
                            </template>
                            <template x-if="!src">
                                <div class="text-center p-5">
                                    <i class="fa-solid fa-upload text-3xl text-gray-500 my-5"></i>
                                    <p class="my-2 text-sm sm:text-lg text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to
                                            upload</span> </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>

                                </div>
                            </template>
                        </div>
                        <input id="dropzone-file" name="image" type="file" accept="image/*" class="hidden"
                            @change="src = URL.createObjectURL($event.target.files[0]) " />

                    </label>
              

                </div>

            </div>


            <div class="mb-4">

                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="type" name="type"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a type</option>
                    <option value="physical">Physical</option>
                    <option value="digital">Digital</option>
                    <option value="service">Service</option>

                </select>
 


            </div>




            <div class="text-center">
                <button type="submit" name="submit" x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="flex items-center text-center mt-auto text-white  bg-amber-500 hover:bg-amber-700  border-0 py-2 w-48 px-4  focus:outline-none  rounded">
                    Add Product
                </button>
            </div>



            <x-vendor.breeze.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>



                <div class="p-6  ">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Are you sure you want to add this product?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Do you want to publish this product instantly?') }}
                    </p>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer">
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer   peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all   peer-checked:bg-blue-600">
                        </div>
                    </label>

                    <div class="flex justify-between">
                        <button type="submit"
                            class="text-white bg-amber-500 hover:bg-amber-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2   focus:outline-none dark:focus:ring-blue-800">
                            Confirm
                        </button>

                        <button type="button" x-on:click="$dispatch('close')"
                            class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2   focus:outline-none dark:focus:ring-blue-800">
                            Cancel
                        </button>
                    </div>

                </div>

            </x-vendor.breeze.modal>
        </div>

    </form>

</div>
