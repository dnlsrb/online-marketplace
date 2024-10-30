@php
    use App\Enums\OrderStatus;
@endphp



@props([
    'status' =>  OrderStatus::PENDING->value
])


@if ($status === OrderStatus::PENDING->value)
<span class="bg-blue-600 text-blue-100 px-4 py-2 rounded  flex sm:inline items-center"><i class="fa-solid fa-hourglass-start px-2"></i> Waiting</span>
@endif


@if($status === OrderStatus::DONE->value)
<span class="bg-green-600 text-green-100 px-4 py-2 rounded flex sm:inline"><i class="fa-solid fa-check px-2"></i> Done</span>
@endif

@if($status === OrderStatus::CANCEL->value)

<span class="bg-red-600 text-red-100 px-4 py-2 rounded flex sm:inline"><i class="fa-solid fa-xmark px-2"></i> Cancelled</span>
@endif

@if($status === OrderStatus::ORDERED->value)

<span class="bg-green-600 text-green-100 px-4 py-2 rounded flex sm:inline"><i class="fa-solid fa-check px-2"></i>Ordered</span>
@endif
{{-- <span class="bg-yellow-600 text-yellow-100 px-4 py-1 rounded  flex sm:inline"><i class="fa-solid fa-truck-fast px-2"></i></i>Delivery</span>

<span class="bg-green-600 text-green-100 px-4 py-1 rounded flex sm:inline"><i class="fa-solid fa-check px-2"></i> Waiting</span> --}}
