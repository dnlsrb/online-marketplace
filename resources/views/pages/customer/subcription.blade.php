<x-layouts.customer-show>

    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-24 mx-auto">
        
        <div class="flex flex-col text-center w-full mb-20">
          @if(empty($subcriptions))
          <x-shared.empty/>
          @else
          <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Pricing</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical.</p>
          @endif
        </div>


          <div class="flex flex-wrap m-4">
            @forelse($subscriptions as $subcription)
            <x-shared.subcription-card 
            title="{{$subcription->name}}" 
            price="{{$subcription->price}}" 
            date="{{$subcription->total_months}}" 
            description="{{$subcription->description}}"  >
              
              <x-shared.subcription-button routeTo="{{$subcription->id}}"  />
            </x-shared.subcription-card>
            @empty

            
            @endforelse
    
 
        
        </div>
      </div>
    </section>

 






</x-layouts.customer-show>