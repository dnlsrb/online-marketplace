<x-layouts.customer-show>

    <section class="text-gray-600 body-font overflow-hidden">
      <div class="container px-5 py-24 mx-auto">
        
        <div class="flex flex-col text-center w-full mb-20">
        
          <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Pricing</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical.</p>
     
        </div>


          <div class="flex flex-wrap m-4">
            @forelse($subscriptions as $subcription)
            <x-shared.subcription-card 
            title="{{$subcription->name}}" 
            price="{{$subcription->price}}" 
            date="{{$subcription->total_months}}" 

            popular="false"
            description="{{$subcription->description}}"  >
              
              <x-shared.subcription-button routeTo="{{$subcription->id}}" popular="false"  />
            </x-shared.subcription-card>
            @empty
           <x-shared.empty/>
            
            @endforelse
    
 
        
        </div>
      </div>
    </section>

 






</x-layouts.customer-show>