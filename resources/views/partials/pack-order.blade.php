

<div class="p-3">
    <h1>{{$order->order_number}}</h1>

    <hr class="my-3">
    <form action="" method="">
    @csrf
    <h1>Tracking Number:</h1>
    <x-shared.input type="text" name="tracking_number" class="w-full mb-2"></x-shared.input>

    <h1>Courier:</h1>
    <x-shared.input type="text" name="courier" class="w-full"></x-shared.input>

    <x-shared.primary-button type="submit" class="mt-3" onclick="return confirm('Are you sure?')">SEND TO SHIPPING</x-shared.primary-button>
    </form>




    <br>
    <button type="button" x-on:click="$dispatch('close')"
    class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mt-5 mb-2   focus:outline-none dark:focus:ring-blue-800">
    Cancel
    </button>
</div>
