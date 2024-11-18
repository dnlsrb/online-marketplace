<x-layouts.seller-index>

    <div class="mb-5">
        <h1 class="text-xl">Transaction</h1>
    @php 
    $home= array("Home", "seller.index");
    // home
    $nav = array(
     
    // add more items here in route
    ); 
    $cur = "Transaction";
    // Current Route
    @endphp
    <x-shared.breadcrumb :home="$home" :nav="$nav" :cur="$cur"/>
        </div>


<div class=" bg-white sm:p-8 p-3">
 
    {{-- @foreach($transaction as $trans)
    <p>Transaction ID: {{ $trans->orderTransaction->order->order_number}}</p>
    <p>Order ID: {{ $trans->payment_type }}</p>
    <p>Product: {{ $trans->amount }}</p>
    <p>Product: {{ $trans->transaction_reference }}</p>
@endforeach --}}

<x-shared.table-body :columns="['Order Number','Payment Type', 'Amount']">
    @foreach($transaction as $trans)
    <tr class="    ">
        <td  class="p-3" >
            <div class=" whitespace-nowrap break-all ">
                {{ $trans->orderTransaction->order->order_number}}
            </div>
        </td>
        <td>{{ $trans->payment_type }}</td>
        <td>
            PHP {{ $trans->amount }}  
        </td>
    </tr>
    @endforeach
   
    
</x-shared.table-body>

</div>
</x-layouts.seller-index>