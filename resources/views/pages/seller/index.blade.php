<x-layouts.seller-index>

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'subcription-open')"  value="Buy Subcription" 
    class="flex  text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"> 
    Add Product
  </button>
        <x-vendor.breeze.modal name="subcription-open" >
            

            <div class="p-5"> 
        <h2 class="text-2xl font-bold mb-6 text-start">Add Product</h2>
        <form>
          <!-- Product Name -->
          <div class="mb-4">
            <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
            <input type="text" id="product-name" name="product-name" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product name">
          </div>
      
          <!-- Description -->
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" name="description" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Enter product description"></textarea>
          </div>
      
          <!-- Image Upload -->
          <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
            <input type="file" id="image" name="image" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
      
          <!-- Type -->
          <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
            <select id="type" name="type" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Select a type</option>
              <option value="physical">Physical</option>
              <option value="digital">Digital</option>
              <option value="service">Service</option>
              <!-- Add more types as needed -->
            </select>
          </div>
      
          <!-- Submit Button -->
          <div class="text-center">
            <input type="submit" name="submit" value="Add Product" class="flex items-center text-center mt-auto text-white bg-indigo-500 border-0 py-2 w-48 px-4  focus:outline-none hover:bg-indigo-600 rounded"> 
          </div>
        </form>
    </div>
    </x-vendor.breeze.modal>
<x-layouts.seller-index> 

