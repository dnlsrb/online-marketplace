<x-layouts.admin-index>

    <h1>Subscriptions list</h1>


    <div class="relative overflow-x-auto   bg-white p-2">
        <x-shared.table-body :columns="['name', 'price', 'description', 'months duration']">
            @foreach ($subscriptions as $subscription)
                <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                    <td></td>
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
