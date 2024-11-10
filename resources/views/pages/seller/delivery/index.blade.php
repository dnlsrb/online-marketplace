@php
    use App\Enums\OrderStatus;
@endphp

<x-layouts.seller-index>
    <div class="mb-5">
        <h1 class="text-xl">deliveries</h1>
        @php
            $home = ['Home', 'seller.index'];
            // home
            $nav = [
                // add more items here in route
            ];
            $cur = 'deliveries';
            // Current Route
        @endphp
        <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur" />
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class=" bg ">
        <div class="hidden sm:block">
            <x-shared.table-body :columns="['Tracking Number & Courier',  'Product', '', 'Total Amount', '', 'Status', 'Actions']">
            </x-shared.table-body>
        </div>
        @foreach ($deliveries as $delivery)
            <div class="mx-auto  w-full flex-none bg-white mt-4  rounded p-5">
                <div class="md:flex md:justify-between">
                    <div class="flex flex-row items-center">
                        <img src="https://dummyimage.com/300x300/cccccc/ffffff&text=Your+Profile"
                            class="object-cover h-8 w-8 rounded-full" alt="" />
                        <a href="{{ route('customer.chat.index') }}">
                            <p class="mx-1">{{ $delivery->order->user->name }} <i
                                    class="fa-solid fa-comment-dots ms-2"></i></p>
                        </a>
                        <p class="mx-1">(1 Item)</p>
                    </div>
                    <p class="text-sm">Order Number: {{ $delivery->order->order_number }}</p>
                </div>
                <hr class="my-3">
                <div class="xl:grid xl:grid-cols-2 xl:gap-2  xl:grid-flow-col">
                    <div class="col-span-2">
                        <x-shared.table-body>

                            <tr class="    ">
                                <td class="  text-amber-700 font-bold text-center px-6 py-3 w-56">
                                    {{ $delivery->tracking_number }}
                                </td>
                                <td class="  text-amber-700 font-bold text-center px-6 py-3 w-56">
                                    {{ $delivery->courier }}
                                </td>
                                <th class="xl:whitespace-nowrap px-6 py-3  w-56">
                                    <div class="sm:flex items-center aspect-square   h-10  ">
                                        <img class="hidden h-auto w-full max-h-full dark:block"
                                            src="{{ $delivery->order->product->image }}" alt="imac image" />
                                        <div href="#" class=" sm:m-2 whitespace-nowrap">
                                            {{ $delivery->order->product->name }}
                                        </div>
                                    </div>
                                </th>
                                <td class="  text-amber-700 font-bold text-center  ">
                                    {{ $delivery->order->quantity }}x
                                </td>
                                <td class="font-bold text-center px-6 py-3 w-72">
                                    ₱{{ $delivery->order->total }}
                                </td>
                                <td class="px-6 py-3   text-center ">

                                    <x-shared.status :status="$delivery->order->status" />
                                </td>

                                
                            </tr>
                        </x-shared.table-body>
                    </div>
                    @if($delivery->order->status == "delivery")  
                    <div class="col-span-2 md:col-span-1 flex items-center  md:w-56 md:mt-0 mt-3">
                        
                        <div>

                            <a href="{{ route('seller.deliveries.status', ['delivery' => $delivery->id, 'status' => OrderStatus::DONE->value]) }}"
                                class='inline-flex items-center px-4 py-2
bg-green-800 dark:bg-green-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-green-800
uppercase tracking-widest hover:bg-green-700 dark:hover:bg-white focus:bg-green-700 dark:focus:bg-white active:bg-green-900
 dark:active:bg-green-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150'>
                                Done
                            </a>

                            <a href="{{ route('seller.deliveries.status', ['delivery' => $delivery->id, 'status' => OrderStatus::CANCEL->value]) }}"
                                class='inline-flex items-center px-4 py-2
bg-red-800 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800
uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900
 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150'>
                                Cancel
                            </a>

                            <x-shared.primary-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'delivery-edit-{{ $delivery->id }}')">Edit</x-shared.primary-button>

                            <x-vendor.breeze.modal name="delivery-edit-{{ $delivery->id }}">

                                <div class="p-3">
                                    <h1>Delivery Edit</h1>

                                    <hr class="my-3">
                                    <form
                                        action="{{ route('seller.deliveries.update', ['delivery' => $delivery->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <h1>Tracking Number:</h1>
                                        <x-shared.input type="text" name="tracking_number"
                                            class="w-full mb-2" value="{{$delivery->tracking_number}}"></x-shared.input>

                                        <input type="hidden" name="delivery" id=""
                                            value="{{ $delivery->id }}">
                                        <h1>Courier:</h1>
                                        <x-shared.input type="text" name="courier" class="w-full" value="{{$delivery->courier}}"></x-shared.input>

                                        <x-shared.primary-button type="submit" class="mt-3"
                                            onclick="return confirm('Are you sure?')">Save</x-shared.primary-button>
                                    </form>




                                    <br>
                                    <div class="flex items-center">
                                        <form
                                            action="{{ route('seller.deliveries.destroy', ['delivery' => $delivery->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')


                                            <button type="submit" x-on:click="$dispatch('close')"
                                                class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-blue-300 font-medium
                                         rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2
                                          focus:outline-none dark:focus:ring-blue-800">
                                              Delete
                                            </button>
                                        </form>
                                        <button type="button" x-on:click="$dispatch('close')"
                                            class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2   focus:outline-none dark:focus:ring-blue-800">
                                            Cancel
                                        </button>
                                    </div>

                                </div>

                            </x-vendor.breeze.modal>

                        </div>
                 
                   
                            

                        
                    </div>
                    @endif   


                </div>
            </div>
        @endforeach
    </section>






</x-layouts.seller-index>
