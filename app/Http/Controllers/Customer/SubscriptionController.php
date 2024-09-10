<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        $subscriptions = Subscription::get();

        return view('pages.customer.subcription', compact(['subscriptions']));
    }

    public function show(string $id){
        $subscription = Subscription::find($id);

        return view('pages.customer.subscription.show', compact(['subscription']));
    }
}
