
@props(['routeTo', 'popular' ])

@if($popular == "true") 
@php 
    $theme = "bg-indigo-600 focus:outline-none hover:bg-indigo-700"
@endphp
@else
@php 
        $theme = "bg-gray-500 focus:outline-none hover:bg-gray-400"
@endphp
@endif
 
<a href="{{route('customer.subscriptions.show', ['subscription' => $routeTo])}}"   value="Buy Subcription"
  class="flex ml-auto w-full text-center text-white mt-5 {{ $theme  }}  border-0 py-2 px-6   rounded">
  Apply as Seller
</a>
 