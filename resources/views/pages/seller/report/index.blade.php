<x-layouts.seller-index>

    <div class="mb-5">
        <h1 class="text-xl">Reports</h1>
    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
     
    // add more items here in route
    ); 
    $cur = "Reports";
    // Current Route
    @endphp
    <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
        </div>


<div class=" bg-white sm:p-8 p-3">
    <button  
                    class="flex items-center text-center mt-auto text-white  bg-amber-500 hover:bg-amber-700  border-0 py-2   px-4  focus:outline-none  rounded">
                    <i class="fa-solid fa-file-excel"></i>
                </button> 
 
    <div class="relative overflow-x-auto     ">

    <x-shared.table-body :columns="['Products','Quantity', 'Purchased By', 'Total', 'Profit','status' ]">
         
        <tr class="    ">
            <td   >
                <div class=" whitespace-nowrap break-all ">
                1 HALF PANCIT CANTON
                </div>
            </td>
            <td>3x</td>
            <td>
                vincent van gogh
            </td>
            <th scope="row" class="pe-6 py-4 font-medium   whitespace-nowrap ">
               25 Pesos

            </th>
            <td  >
              100 sagad
            </td>
            <td>
                <span class="bg-blue-600 text-blue-100 px-4 py-1 rounded  flex sm:inline"><i class="fa-solid fa-hourglass-start px-2"></i> Waiting</span>
                <span class="bg-yellow-600 text-yellow-100 px-4 py-1 rounded  flex sm:inline"><i class="fa-solid fa-truck-fast px-2"></i></i>Delivery</span>
                <span class="bg-red-600 text-red-100 px-4 py-1 rounded flex sm:inline"><i class="fa-solid fa-xmark px-2"></i> Cancelled</span>
                <span class="bg-green-600 text-green-100 px-4 py-1 rounded flex sm:inline"><i class="fa-solid fa-check px-2"></i> Waiting</span>

            </td>
           
          
      
        </tr>
       
        
    </x-shared.table-body>
    </div>
</div>
</x-layouts.seller-index>