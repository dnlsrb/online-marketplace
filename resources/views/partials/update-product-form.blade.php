<div class="bg-white p-5">
    <h1 class="font-bold">Basic information</h1>


 
    <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mt-10">

            <div class="mb-4" x-data="{
                name: '{{$product->name}}',
                limit: $el.dataset.limit,
                get remaining() {
                    return this.limit - this.name.length
                }
            }" data-limit="120">
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name  @if ($errors->has('name')) <span class="text-xs text-error">({{ $errors->first('name') }})</span> @endif</label>
                </label>
                <input type="text" x-model="name" maxlength="120" id="product-name" name="name" value="{{$product->name}}"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter product name">
                <label class="text-gray-400"> <span x-text="remaining"></span>/120</label>

       
            </div>

            <div class="    mb-4"  >
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Price @if ($errors->has('price')) <span class="text-xs text-error">({{ $errors->first('price') }})</span> @endif
                    </label>
                <input type="number" x-model="name" maxlength="120" id="product-name" name="price"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="₱ {{$product->price}}">
        
              
            </div>


            <div class="mb-4" x-data="{
                description: '{{$product->description}}',
                limit: $el.dataset.limit,
                get remaining() {
                    return this.limit - this.description.length
                }
            }" data-limit="2000">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Product
                    Description @if ($errors->has('description')) <span class="text-xs text-error">({{ $errors->first('description') }})</span>@endif</label>
                <textarea id="description" x-model="description" maxlength="2000" name="description"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3" value="{{$product->description}}" placeholder="Enter product description"> </textarea>
                <label class="text-gray-400"> <span x-text="remaining"></span>/2000</label>
                 
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image
                    @if ($errors->has('image')) <span class="text-xs text-error">({{ $errors->first('image') }})</span>@endif

                </label>
                <div x-data="{ src: '{{$product->image}}' }" class="flex flex-col  items-start">



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
                    <option value="">{{$product->type}}</option>
                    <option value="physical">Physical</option>
                    <option value="digital">Digital</option>
                    <option value="service">Service</option>

                </select>
 


            </div>




            <div class="text-center flex">
                <button type="submit" name="submit"     
                    class="flex items-center text-center mt-auto text-white  bg-amber-500 hover:bg-amber-700  border-0 py-2 w-48 px-4  focus:outline-none  rounded">
                    Update
                </button>
                <a href="{{route('seller.products.index')}}" name="submit"     
          class="mx-5 flex items-center text-center mt-auto text-white  bg-gray-500 hover:bg-gray-700  border-0 py-2 w-48 px-4  focus:outline-none  rounded">
                    Cancel
            </a>
            </div>



           
        </div>

    </form>

</div>