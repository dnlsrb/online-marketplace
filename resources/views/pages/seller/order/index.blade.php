<x-layouts.seller-index>
    <div class="mb-5">
        <h1 class="text-xl">Orders</h1>
    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
     
    // add more items here in route
    ); 
    $cur = "Orders";
    // Current Route
    @endphp
    <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
        </div>


    <section class=" bg ">
        <div class="hidden sm:block"> 
        <x-shared.table-body  :columns="['Product', '', 'Total Amount', '','Status', 'Actions']">
        </x-shared.table-body>
    </div>
        @foreach ($orders as $order)
        <div class="mx-auto  w-full flex-none bg-white mt-4  rounded p-5">
            <div class="md:flex md:justify-between"> 
            <div class="flex flex-row items-center"> 
            <img src="https://dummyimage.com/300x300/cccccc/ffffff&text=Your+Profile" class="object-cover h-8 w-8 rounded-full" alt="" />
            <a href="{{route('customer.chat.index')}}"><p class="mx-1">{{$order->user->name}} <i class="fa-solid fa-comment-dots ms-2"></i></p>
            </a>
            <p class="mx-1">(1 Item)</p>
            </div>
            <p class="text-sm">Order Number:  {{ $order->order_number }}</p>
        </div>
        <hr class="my-3">
        <div class="grid grid-cols-2 gap-2  grid-flow-col"> 
            <div class="col-span-2"> 
            <x-shared.table-body  >
                    <tr class="    ">

                        <th class="xl:whitespace-nowrap px-6 py-3  ">
                            <div class="sm:flex items-center aspect-square w-10 h-10  ">
                                <img class="hidden h-auto w-full max-h-full dark:block"
                                    src="{{$order->product->image}}"
                                    alt="imac image" />
                                <div href="#" class=" sm:m-2 whitespace-nowrap" > {{$order->product->name}} 
                                </div>
                            </div>
                        </th>
                        <td class="  text-amber-700 font-bold text-center px-6 py-3 w-10">
                            {{ $order->quantity }}x
                        </td>
                        <td class="font-bold text-center px-6 py-3">
                            ₱{{ $order->total }}
                        </td>
                        <td class="px-6 py-3   text-center">

                            <x-shared.status :status="$order->status" />
                        </td>
                        

        </tr>
        </x-shared.table-body>
    </div>
    <div class="col-span-1 flex items-center"> 

    <form>
    @csrf 
        <x-shared.primary-button  >PACK</x-shared.primary-button>
    </form>

    </div>



    </div>
    </div>
        @endforeach
    </section>






</x-layouts.seller-index>
