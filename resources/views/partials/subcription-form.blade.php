<form action="{{ route('customer.subscriptions.store') }}"  id="FormPaypal" method="POST" class=" " enctype="multipart/form-data">
    @csrf
  


    <h2 class="text-md sm:text-lg font-medium  bg-gray-100     rounded mb-2">
        {{ __('Business Partner Recommendation Form') }}
    </h2>


    <label for="name" class="block mt-2 text-sm sm:text-lg font-medium">Business Name <span class="text-red-600 font-bold">*</span></label>
    <input type="text" id="name" name="name"
        class="bg-gray-50 border border-gray-300   text-sm sm:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
        required />

    <label for="type" class="block text-sm sm:text-lg font-medium  mt-3  ">Business Type<span class="text-red-600 font-bold">*</span></label>
    <input type="text" name="type" id="type"
        class="bg-gray-50 border border-gray-300   text-sm sm:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
        required />

    <label for="email" class="block mt-2 text-sm sm:text-lg font-medium    ">Email address<span class="text-red-600 font-bold">*</span></label>
    <input type="email" name="email" id="email"
        class="bg-gray-50 border border-gray-300   text-sm sm:text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
        placeholder="john.doe@company.com" required />

    <label for="description" class="block  text-sm sm:text-lg font-medium  mt-2 ">Business Description<span class="text-red-600 font-bold">*</span></label>
    <textarea id="description" name="description" rows="4"
        class="block p-2.5 w-full text-sm sm:text-lg text-gray-900 bg-gray-50 rounded-lg border border-gray-300   "
        placeholder="Description here"></textarea>

    <label class="block mt-2 text-sm sm:text-lg font-medium    ">Business Logo<span class="text-red-600 font-bold">*</span></label>
    <div  x-data="{src: ''}" class="flex flex-col items-center justify-center w-full">
       
      
        <template x-if="src">
            <img :src="src" class="w-60 "  alt>
        </template>
        <label for="dropzone-file" id="label"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  0">
           
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <i class="fa-solid fa-upload text-3xl text-gray-500 my-5"></i>
                <p class="my-2 text-sm sm:text-lg text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                <div  >
                        <h1   x-text="src"> </h1>
                </div>
            </div>
            <input id="dropzone-file" name="logo" type="file"  accept="image/*" class="hidden" @change="src = URL.createObjectURL($event.target.files[0]) " />
        
        </label>
 

    </div>
 
    <div class="flex items-start my-6">
        
        <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300  " required />
        </div>
        <label for="terms" class="ms-2 text-sm sm:text-lg font-medium   dark:text-gray-300">I agree with the <a
                href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                conditions<span class="text-red-600 font-bold">*</span></a>.</label>
    </div>
 
    <div class="flex flex-col sm:flex-row gap-2 w-full items-start p-2 border  rounded bg-gray-100" x-data="paypalGateWay" x-init="getSubscription({{ json_encode($subscription) }})">
        <div class="flex flex-col w-full   "> 
            <div class=" flex p-2  flex-col sm:flex-row flex-wrap   bg-gray-100  border-b-2  w-full  ">
        
                <div class="flex-grow  justify-center">
                    <h2 class="text-gray-900 text-xl sm:text-lg title-font  font-bold mb-3 ">{{ $subscription->name }}</h2>
                    <p class="leading-relaxed text-sm sm:text-md text-base">
                        {{ $subscription->description }}
                    </p>
                </div>
        
                <div class="flex justify-end items-center">
                    <h2 class="text-gray-900  text-5xl title-font  font-medium  ">₱{{ $subscription->price }}</h2><span
                        class="flex items-end h-full">/{{ $subscription->total_months }} months</span>
                </div>
        
            </div>
         <div class=" p-2 flex justify-between">
            <h1 class="text-xl font-bold">Total</h1> 
            <h1  class="text-3xl font-bold">₱{{ $subscription->price }}</h1>
        </div>
        </div>
         
        <template x-if="!item">
            <img src="{{ asset('loading.gif') }}" alt="" srcset="" class="w-1/2 aspect-square">
        </template>


        <div class="w-full flex flex-col  rounded p-4 bg-gray-100"> 
        <h1 class="text-xl mb-3   font-bold  rounded  ">Payment Option</h1>
        <div x-show="item && !orderData" x-ref="buttonsContainer" class="   ">
            
        </div>
        <a href="{{ route('customer.subscriptions.index') }}"
        class="   text-white bg-gray-500 border-0   p-1 sm:p-2 sm:text-xl text-sm text-center font-semibold w-full  focus:outline-none hover:bg-gray-400 rounded-sm">
        Cancel
    </a>
        </div>
         
        <template x-if="orderData">
            <div class="w-1/2 flex flex-col w-full">
                <h1>
                    Name : <span x-text="orderData?.payer.name.given_name"> </span> <span
                        x-text="orderData?.payer.name.surname"> </span>
                </h1>
                <p>
                    Email address : <span x-text="orderData?.payer.name.email_address">
                </p>
                <p>
                    payment number : <span x-text="orderData?.id"> </span>
                </p>

                <p>
                    Purchase units
                </p>
                <template x-for="(purchase, index) in orderData?.purchase_units" :key="index">
                    <div class="flex flex-col gap-2">
                        <p>
                            <span>Amount </span>
                            <span x-text="purchase.amount.value">

                            </span>
                        </p>
                        <p>
                            <span>Currency </span>
                            <span x-text="purchase.amount.currency_code">

                            </span>
                        </p>
                    </div>
                </template>
                <p>
                    status : <span x-text="orderData?.status"> </span>
                </p>
                <p x-text="orderData">

                </p>
                <input type="hidden" x-model="JSON.stringify(orderData)" name="orderData">
                
            </div>
        </template>
       
 
    </div>

    <input type="hidden" name="subscription_id" value="{{$subscription->id}}">
    
   

</form>
 