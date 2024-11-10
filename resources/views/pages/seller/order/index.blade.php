<x-layouts.seller-index>
    <div class="mb-5">
        <h1 class="text-xl">Orders</h1>
        @php
            $home = ['Home', 'seller.index'];
            // home
            $nav = [
                // add more items here in route
            ];
            $cur = 'Orders';
            // Current Route
        @endphp
        <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur" />
    </div>


    @if (session('success'))
    <x-shared.alert alert="success" >{{session('success')}}. <a href="{{route("seller.deliveries.index")}}" class="underline text-blue-700">Check your delivery.</a></x-shared.alert>
       
    @endif
    <section class=" bg ">
        <div class="hidden sm:block">
            <x-shared.table-body :columns="['Product', '', 'Total Amount', '', 'Status', 'Actions']">
            </x-shared.table-body>
        </div>
        @foreach ($orders as $order)
            <div class="mx-auto  w-full flex-none bg-white mt-4  rounded p-5">
                <div class="md:flex md:justify-between">
                    <div class="flex flex-row items-center">
                        <img src="https://dummyimage.com/300x300/cccccc/ffffff&text=Your+Profile"
                            class="object-cover h-8 w-8 rounded-full" alt="" />
                        <a href="{{ route('customer.chat.index') }}">
                            <p class="mx-1">{{ $order->user->name }} <i class="fa-solid fa-comment-dots ms-2"></i></p>
                        </a>
                    

                       
                    </div>
                    <p class="text-gray-400">
                       address: {{$order->user->profile->address ?? 'No Address'}}
                    </p>
                    <p class="text-sm">Order Number: {{ $order->order_number }}</p>
                </div>
                <hr class="my-3">
                <div class="xl:grid xl:grid-cols-2 xl:gap-2  xl:grid-flow-col">
                    <div class="col-span-2">
                        <x-shared.table-body>
                            <tr class="    ">

                                <th class="xl:whitespace-nowrap px-6 py-3 w-56">
                                    <div class="sm:flex items-center aspect-square w-10 h-10  ">
                                        <img class="hidden h-auto w-full max-h-full dark:block"
                                            src="{{ $order->product->image }}" alt="imac image" />
                                        <div href="#" class=" sm:m-2 whitespace-nowrap">
                                            {{ $order->product->name }}  <br>
                                            <span class="  text-amber-700 font-bold text-center  w-10">
                                               Quantity: {{ $order->quantity }}x
                                            </span>
                                        </div>
                                    </div>
                                </th>
                           
                                <td class="font-bold text-center px-6 py-3 w-2/4">
                                    ₱{{ $order->total }}
                                </td>
                                <td class="px-6 py-3   text-start w-2/4">

                                    <x-shared.status :status="$order->status" />
                                </td>


                            </tr>
                        </x-shared.table-body>
                    </div>
               
                    <div class="col-span-1 flex items-center w-56">
                        @if($order->status == "ordered")  
                        <div>

                            <x-shared.primary-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'pack-order{{ $order->id }}')">PACK</x-shared.primary-button>

                            <x-vendor.breeze.modal name="pack-order{{ $order->id }}">

                                <div class="p-3">
                                    <h1>{{ $order->order_number }}</h1>

                                    <hr class="my-3">
                                    <form action="{{ route('seller.deliveries.store') }}" method="POST">
                                        @csrf
                                        <h1>Tracking Number:</h1>
                                        <x-shared.input type="text" name="tracking_number"
                                            class="w-full mb-2"></x-shared.input>

                                        <input type="hidden" name="order" id=""
                                            value="{{ $order->id }}">
                                        <h1>Courier:</h1>
                                        <x-shared.input type="text" name="courier" class="w-full"></x-shared.input>

                                        <x-shared.primary-button type="submit" class="mt-3"
                                            onclick="return confirm('Are you sure?')">SEND TO
                                            SHIPPING</x-shared.primary-button>
                                    </form>




                                    <br>
                                    <button type="button" x-on:click="$dispatch('close')"
                                        class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2   focus:outline-none dark:focus:ring-blue-800">
                                        Cancel
                                    </button>
                                </div>

                            </x-vendor.breeze.modal>

                        </div>
                        @elseif($order->status == "received")
                        <p>Completed</p>
                        @elseif($order->status == "done")
                        <p>Completed</p>
                        @elseif($order->status == "cancel")
                        <p>Cancelled</p>
                        @else
                        <p>Shipped</p>
                        @endif
                       
                        
                       
                    </div>



                </div>
            </div>
        @endforeach
    </section>






</x-layouts.seller-index>
