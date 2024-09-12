@php
    use Carbon\Carbon;
@endphp

<x-layouts.app >

    <x-notauth.nav />
    <div class="container mx-auto p-5 bg-white rounded rounded-md">
        <x-shared.logo class="text-2xl stroke-2 block sm:hidden text-center mb-5"/>
        {{$subscribe->subscription->name}}

        <h1>
            <span>Start Date</span>
            {{date('F d, Y h:s A',  strtotime($subscribe->start_date))}}
        </h1>
        <h1>
            <span>{{Carbon::now()->diffInDays($subscribe->end_date)}}</span>
             Days
        </h1>
        <h1>
            <span>End Date </span>
            {{date('F d, Y h:s A', strtotime($subscribe->end_date))}}
        </h1>

    </div>




    <x-notauth.footer />
    </x-layouts.app >
