<div class="bg-white p-5">
    <div class="flex items-center justify-between">
        <h1 class="font-bold">Basic information</h1>

    </div>



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
                <input type="number"  maxlength="120" id="product-name" name="price"  value="{{$product->price}}"
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
                        class="flex flex-col items-center justify-center  min-w-56 min-h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  ">

                        <div class="flex flex-col items-center justify-center pt-5 pb-6">

                                <img  src="{{$product->image}}" id="image-source" class="w-60 " alt>

                                <div class="text-center p-5 hidden" id="hide">
                                    <i class="fa-solid fa-upload text-3xl text-gray-500 my-5"></i>
                                    <p class="my-2 text-sm sm:text-lg text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to
                                            upload</span> </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>

                                </div>
                        </div>
                        <input id="dropzone-file" name="image"  type="file" accept="image/*" class="w-56 " value="{{$product->image}}"
                        @change="handleImageChange($event)" />
                    </label>
                    <span class="text-gray-400"  >Max size: 5 mb</span>
                    <span class="text-green-500" id="notBlurry"></span>
                    <span class="text-red-500" id="isBlurry"></span>


                </div>
                <script>
                    function handleImageChange(event) {
                        const file = event.target.files[0];
                        if (!file) return;

                        // Create an object URL for the image
                        const src = URL.createObjectURL(file);
                        // Load the image into an <img> element
                        const img = new Image();
                        img.src = src;
                        img.onload = () => {
                            // Create a canvas to draw the image
                            const canvas = document.createElement("canvas");
                            const ctx = canvas.getContext("2d");
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0);

                            // Perform blur detection (Laplacian variance method)
                            const pixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
                            const isBlurry = detectBlur(pixels);


                            if (isBlurry) {
                                document.getElementById('notBlurry').innerHTML="";
                                document.getElementById('isBlurry').innerHTML="Image appears to be blurry. Please upload a clearer image.";
                                document.getElementById('image-source').src= "";
                                document.getElementById('hide').style.display =  'block';
                                document.getElementById('dropzone-file').value="";
                            } else {
                                document.getElementById('isBlurry').innerHTML="";
                                document.getElementById('notBlurry').innerHTML="Image is clear";
                                document.getElementById('hide').style.display = 'none';
                                document.getElementById('image-source').src= src;
                            }

                            // Clean up object URL
                            URL.revokeObjectURL(src);
                        };
                    }

                    // Simple Laplacian variance blur detection
                    function detectBlur(imageData) {
                        const gray = new Uint8ClampedArray(imageData.data.length / 4);
                        for (let i = 0; i < imageData.data.length; i += 4) {
                            gray[i / 4] = 0.299 * imageData.data[i] + 0.587 * imageData.data[i + 1] + 0.114 * imageData.data[i + 2];
                        }

                        // Calculate the Laplacian variance
                        let sum = 0, sumSq = 0;
                        for (let i = 1; i < gray.length - 1; i++) {
                            const diff = gray[i] - gray[i - 1];
                            sum += diff;
                            sumSq += diff * diff;
                        }
                        const variance = (sumSq - (sum * sum) / gray.length) / gray.length;

                        // Define a threshold for blur detection (tweak as necessary)
                        return variance < 100; // Threshold; lower values indicate higher blur
                    }
                    </script>
            </div>


            <div class="mb-4">

                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="type" name="type"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="{{$product->type}}" selected>{{$product->type}}</option>
                    <option value="physical">Physical</option>
                    <option value="digital">Digital</option>
                    <option value="service">Service</option>

                </select>



            </div>




            <div class="text-center flex">
                <button type="submit" name="submit"
                    class="flex items-center text-center mt-auto text-white  bg-amber-500 hover:bg-amber-700  border-0 py-2  px-4  focus:outline-none  rounded">
                    Update
                </button>

            </form>
            <form action="{{route('seller.products.destroy', ['product' => $product->id])}}" method="post">
                @csrf
                @method('DELETE')

                <button
                class="mx-5 flex items-center text-center mt-auto
                text-white  bg-red-500 hover:bg-red-700  border-0 py-2   px-4  focus:outline-none  rounded">
                          Delete
                  </button>
            </form>
            <a href="{{route('seller.products.index')}}" name="submit"
            class="  flex items-center text-center mt-auto text-white  bg-gray-500 hover:bg-gray-700  border-0 py-2  px-4  focus:outline-none  rounded">
                      Cancel
              </a>
            </div>
        </div>
    </form>

</div>
