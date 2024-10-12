

@if ($errors->any())
 
<div class="my-3 p-4 text-sm rounded-sm text-blue-800 rounded-lg text-error border border-error bg-white" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><span class="font-medium">Error</span> 
  </div>
@endif
   
<div class="bg-white p-5">
    <h1 class="font-bold">Basic information</h1>



    <form class="flex flex-col gap-2" method="POST" action="{{route('admin.subscriptions.store')}}">
 
        @csrf
        <div class="mt-10">
           
            <div class="mb-4" x-data="{
                name: '',
                limit: $el.dataset.limit,
                get remaining() {
                    return this.limit - this.name.length
                }
            }" data-limit="120">
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Subcription Name  @if ($errors->has('name')) <span class="text-xs text-error">({{ $errors->first('name') }})</span> @endif</label>
                </label>
                <input type="text" x-model="name" maxlength="120"  name="name"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Subcription Name">
                <label class="text-gray-400"> <span x-text="remaining"></span>/120</label>

       
            </div>

            <div class="    mb-4"  >
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Price @if ($errors->has('price')) <span class="text-xs text-error">({{ $errors->first('price') }})</span> @endif
                    </label>
                <input type="number" x-model="name" maxlength="120"  name="price"
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
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Subcription Description @if ($errors->has('description')) <span class="text-xs text-error">({{ $errors->first('description') }})</span>@endif</label>
                <textarea id="description" x-model="description" maxlength="2000" name="description"
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3"  ></textarea>
                <label class="text-gray-400"> <span x-text="remaining"></span>/2000</label>
                 
            </div>
            <div class="    mb-4"  >
                <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Total Months @if ($errors->has('total_months')) <span class="text-xs text-error">({{ $errors->first('total_months') }})</span> @endif
                    </label>
                <input type="number"   maxlength="120"  name="total_months" 
                    class="w-full border border-gray-300 rounded-sm  p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Total Months">
           
              
            </div>
            

            <div class="text-center">
                <button type="submit" name="submit" x-data=""
                    
                    class="flex items-center text-center mt-auto text-white  bg-amber-500 hover:bg-amber-700  border-0 py-2 w-48 px-4  focus:outline-none  rounded">
                    Add Subcription
                </button>
            </div>


 
        </div>

    </form>

</div>
