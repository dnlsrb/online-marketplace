@props(['alert' => 'danger'])
@php
$alert = [
    'danger' => 'text-red-700 border-red-700',
    'success' => 'text-green-700 border-green-700',
    'warning' => 'text-yellow-300 border-yellow-300',
   'info' =>'text-blue-700 border-blue-700',
][$alert];
@endphp
<div {{ $attributes->merge(['class' => "border   p-4 mb-4 text-sm rounded-lg rounded-sm bg-gray-50   $alert "]) }} role="alert">
   {{$slot}}
  </div>