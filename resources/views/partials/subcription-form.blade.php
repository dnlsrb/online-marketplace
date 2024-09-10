<form class="p-5">
    <h2 class="text-md sm:text-lg font-medium  bg-gray-100     rounded mb-2">
      {{ __('Business Partner Recommendation Form') }}
    </h2>
  
   
      <label for="name" class="block mt-2 text-sm font-medium">Business Name</label>
      <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "   required />

      <label for="type" class="block text-sm font-medium  mt-3  ">Business Type</label>
      <input type="text" name="type" id="type" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "  required />
     
      <label for="email" class="block mt-2 text-sm font-medium    ">Email address</label>
      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="john.doe@company.com" required />
      
      <label for="description" class="block  text-sm font-medium  mt-2 ">Business Description</label>
      <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   " placeholder="Description here"></textarea>
  
      <label   class="block mt-2 text-sm font-medium    ">Business Logo</label>
      <div class="flex items-center justify-center w-full">
      
        <label for="dropzone-file" id="label" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  0">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="my-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>

    </div>


      <div class="flex items-start my-6">
      <div class="flex items-center h-5">
      <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300  " required />
      </div>
      <label for="terms" class="ms-2 text-sm font-medium   dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
  </div>
  <div class="flex justify-between">
    <input type="submit" value="Procced" 
    class="flex  text-center mt-auto text-white bg-indigo-500 border-0 py-2 w-48 px-4  focus:outline-none hover:bg-indigo-600 rounded"> 
    <a href="{{route('customer.subscriptions.index')}}"  class="flex  text-center mt-auto text-white bg-gray-500 border-0 py-2 w-48 px-4  focus:outline-none hover:bg-gray-400 rounded"> 
    Back
    </a>
  </div>
   
  </form>