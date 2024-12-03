<x-layouts.admin-index>


    <div class="mb-5">
        <h1 class="text-xl">Subcription List</h1>
    @php 
    $home= array("Home", "admin.index");
    // home
    $nav = array(
    "1" => ["Subcription", ],
    // add more items here in route
    ); 
    $cur = "Subcription Listing";
    // Current Route
    @endphp
    <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
        </div>

 
    <div class="relative overflow-x-auto   bg-white p-2">
        <x-shared.table-body :columns="['name', 'price', 'description', 'months duration' ]">
            @foreach ($subscriptions as $subscription)
                <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                
                    <td class="px-6 py-4">
                        {{ $subscription->name }}
                    </td>
                    <td>
                        {{ $subscription->price }}
                    </td>
                    <td>
                        {{ $subscription->description }}
                    </td>
                    <td>
                        {{ $subscription->total_months }}
                    </td>
                  
                </tr>
            @endforeach
        </x-shared.table-body>
    </div>

</x-layouts.admin-index>
