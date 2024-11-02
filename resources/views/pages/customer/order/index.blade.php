@php
    use App\Enums\OrderStatus;
@endphp
<x-layouts.customer-show>

    <section class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
        <div class="mx-auto  w-full flex-none  xl:max-w-7xl bg-white   rounded p-5">

            <div class="flex  w-full items-center  bg-white">
                <a href="/" type="button"
                    class="mx-1  h-full flex items-center p-4 my-5 block border-gray-300 bg-white border hover:bg-gray-200   text-xl ms-3">
                    <i class="fa-solid fa-reply"></i>
                </a>
                <h1 class="text-2xl  font-semibold h-full flex items-center ms-3">Orders</h1>
            </div>
            <form class="max-w-lg  " class="py-5  ">

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none text-gray-900 ">
                        <i class="fa-solid fa-filter"></i>
                    </div>
                    <input type="search" id="default-search"
                        class="placeholder:italic block w-full p-4 ps-10 text-sm border-0 bg-transparent mb-3 border-b  "
                        placeholder="Search Order ID" />

                </div>
            </form>
            <h5>Show: </h5>
            <div class="flex flex-wrap">
                <div class="flex items-center me-4">
                    <input id="all-radio" type="radio" value="" name="radio"
                        class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2 focus:ring-2">
                    <label for="all-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">All</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="confirmed-radio" type="radio" value="" name="radio"
                        class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 ">
                    <label for="confirmed-radio"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">Confirmed</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inDelivery-radio" type="radio" value="" name="radio"
                        class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 ">
                    <label for="inDelivery-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">In
                        Delivery</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="Cancelled-radio" type="radio" value="" name="radio"
                        class="w-4 h-4 text-primary-400 bg-gray-100 border-gray-300 focus:ring-primary-400  mx-2  focus:ring-2 ">
                    <label for="Cancelled-radio"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-500">Cancelled</label>
                </div>
            </div>
            <x-shared.table-body :columns="['ID', 'PRICE', 'STATUS', '']">


                @foreach ($orders as $order)
                    <tr class="    ">

                        <th scope="row" class="pe-6 py-4 font-medium   whitespace-nowrap ">
                            <h1>{{ $order->order_number }}</h1>
                        </th>
                        <td>
                            ₱{{ $order->total }}
                        </td>
                        <td>

                            <x-shared.status :status="$order->status" />
                        </td>
                        <td x-data="">

                            <button id="dropdownDefaultButton-{{ $order->id }}"
                                data-dropdown-toggle="dropdown-{{ $order->id }}"
                                class="  font-medium   text-sm px-5 py-2.5 text-center inline-flex items-center  "
                                type="button">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown-{{ $order->id }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
                                <ul class="py-2 text-sm text-gray-700  "
                                    aria-labelledby="dropdownDefaultButton-{{ $order->id }}">
                                    <li>
                                        <button class="block   py-2 hover:bg-gray-100 w-full text-center"
                                            x-on:click.prevent="$dispatch('open-modal', 'view-details-{{ $order->id }}')">View
                                            Details</button>
                                    </li>
                                    <li>
                                        @if (in_array($order->status, [OrderStatus::PENDING->value, OrderStatus::ORDERED->value]))
                                        <button
                                        @click.prevent="$dispatch('open-modal', 'cancel-order{{ $order->id }}')"
                                        class="block   py-2 hover:bg-gray-100 w-full text-center ">Cancel
                                        Order</button>
                                        @endif

                                    </li>
                                    <li>
                                        <form action="{{route('customer.products.received', ['order' => $order->id])}}" method="post">
                                            @csrf
                                            <button
                                            class="block   py-2 hover:bg-gray-100 w-full text-center ">Received
                                            Order</A>
                                        </form>

                                    </li>
                                </ul>
                            </div>


                            <x-vendor.breeze.modal name="view-details-{{ $order->id }}" focusable>
                                <div class="p-3">


                                    <h1 class="font-semibold text-lg py-2">Order Details</h1>
                                    <hr class="my-2">
                                    @if(isset($order->delivery->tracking_number))
                                    <div class="border border-green-700 rounded p-3 bg-white"> 
                                    <h1 class="font-semibold text-md py-2 text-green-700">Tracking Number</h1>
                                    <span class="text-green-700">{{ $order->delivery->tracking_number}}</span>
                                </div>
                                    @endif
                                 
                                    <h1 class="font-semibold text-md py-2">Billing & Delivery Information</h1>
                                  {{$order->user->profile->address}}
                                    <hr class="my-2">
                                    <table class="w-full text-left font-medium text-gray-900   md:table-fixed">
                                        <tbody>
                                            <tr>
                                                <td class="whitespace-nowrap py-4 md:w-[384px]">
                                                    <div class="flex items-center aspect-square w-10 h-10 shrink-0">
                                                        <img class="hidden h-auto w-full max-h-full dark:block"
                                                            src="{{ $order->product->image }}" alt="imac image" />
                                                        <div href="#" class="hover:underline mx-2">
                                                            {{ $order->product->name }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">₱ {{ $order->product->price }} </td>
                                                <td class="text-center"> {{ $order->quantity }}x </td>
                                                <td>₱ {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr class="my-2">
                                    <h1 class="font-semibold text-lg py-2">Order Summary</h1>
                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <dl class="flex items-center justify-between gap-4">
                                                <dt class="text-gray-500 ">Original price</dt>
                                                <dd class="text-base font-medium text-gray-900  ">₱{{ $order->total }}
                                                </dd>
                                            </dl>
                                            {{-- <dl class="flex items-center justify-between gap-4">
                                                <dt class="text-gray-500 ">Delivery</dt>
                                                <dd class="text-base font-medium text-gray-900  ">-₱120.00</dd>
                                            </dl> --}}
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-gray-500 ">Total</dt>
                                        <dd class="text-base font-medium text-gray-900  ">₱{{ $order->total }}</dd>
                                    </dl>
                                </div>


        </div>
        </x-vendor.breeze.modal>

        <x-vendor.breeze.modal name="cancel-order{{ $order->id }}" focusable>
            <div class="p-3">


                <h1 class="font-semibold text-lg py-2">Order Cancel</h1>
                <hr class="my-2">
                <h1 class="font-semibold text-md py-2">Are you sure ?</h1>

                <hr class="my-2">


            </div>
            <div class="flex  justify-between p-3 ">
            <form action="{{ route('customer.products.cancel', ['order' => $order->id]) }}" method="post">
                @csrf
                <x-shared.primary-button>Yes</x-shared.primary-button>
    
            </form>
            <button type="button" x-on:click="$dispatch('close')"
            class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5   me-2  focus:outline-none dark:focus:ring-blue-800">
            Cancel
            </button>
            </div>

            </div>
        </x-vendor.breeze.modal>

        </td>

        </tr>
        @endforeach


        {{-- table data here --}}
        </x-shared.table-body>
        </div>
    </section>






</x-layouts.customer-show>
