     

@props(['price', 'title', 'date', 'description', 'popular' ])

 

@if($popular == "true") 
@php 
    $theme = "border-indigo-600 "
@endphp
@else
@php 
        $theme = "border-gray-500   "
@endphp
@endif     


            <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                <div class="h-full p-6 rounded-lg border-2   {{  $theme   }}  flex flex-col relative overflow-hidden">
               
                  @if($popular == "true") 
                  <span class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">POPULAR</span>
                  @endif
                  <h2 class="text-sm tracking-widest title-font mb-1 font-medium">{{$title}}</h2>
                  <h1 class="text-5xl text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                    <span>₱{{$price}}</span>
                    <span class="text-lg ml-1 font-normal text-gray-500">/{{$date}}</span>
                  </h1>
                  @if(!empty($description))
                  <p class="text-xs text-gray-500 mt-3">{{$description}}</p>
                  @endif
                  {{$slot}}
                 
               
                </div>
              </div>