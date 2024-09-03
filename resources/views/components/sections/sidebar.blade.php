<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content  ">
        <x-sections.wrapper>
            {{$slot}}
        </x-sections.wrapper>
    </div>
    <div class="drawer-side">
      <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    
      <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
        <!-- Sidebar content here -->   
        <p class="text-lg ...">Filter</p> 
        <p class="text-lg ...">Product Type</p>
        <li>
          <div class="flex items-center ">
          <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="default-checkbox" class="ms-2 text-sm font-medium   ">Default checkbox</label>
        </div>
        </li>
        <li>
        <div class="flex items-center">
          <input checked id="checked-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
          <label for="checked-checkbox" class="ms-2 text-sm font-medium   ">Checked state</label>
        </div>
       </li>
       
       <p class="text-lg ...">Min Order</p>
        <li>
          <label for="default-range" class="block mb-2 text-sm font-medium ">Default range</label>
          <input id="default-range" type="range" value="50" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        </li>
        <li>
          <label for="default-range" class="block mb-2 text-sm font-medium ">Default range</label>
          <input id="default-range" type="range" value="50" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        </li>
 
      </ul>
    </div>
  </div>