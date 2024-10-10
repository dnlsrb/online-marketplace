<x-layouts.admin-index>

    <form class="flex flex-col gap-2" method="POST" action="{{route('admin.subscriptions.store')}}">
        @csrf
        <h1>
            Subscription

        </h1>


        <input type="text" name="name" placeholder="name">
        @if ($errors->has('name'))
            <span class="text-xs text-error">{{$errors->first('name')}}</span>
        @endif

        <input type="number" name="price" placeholder="price">
        @if ($errors->has('price'))
            <span class="text-xs text-error">{{$errors->first('price')}}</span>
        @endif


        <textarea  name="description" placeholder="description">
        </textarea>
        @if ($errors->has('description'))
            <span class="text-xs text-error">{{$errors->first('description')}}</span>
        @endif

        <input type="number" name="total_months" placeholder="Months">
        @if ($errors->has('total_months'))
            <span class="text-xs text-error">{{$errors->first('total_months')}}</span>
        @endif

        <button class="btn btn-primary">
            Submit
        </button>
    </form>

 </x-layouts.admin-index>
