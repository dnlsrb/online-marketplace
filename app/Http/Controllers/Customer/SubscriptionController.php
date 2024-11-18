<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Enums\UserRoles;
use App\Models\Business;
use App\Models\Transaction;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\SubscribeUser;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionTransaction;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::get();

        return view('pages.customer.subcription', compact(['subscriptions']));
    }

    public function show(string $id)
    {
        $subscription = Subscription::find($id);

        return view('pages.customer.subscription.show', compact(['subscription']));
    }

    public function store(Request $request)
    {

        $paymentData = json_decode($request->orderData);

        $user = User::find(Auth::user()->id);

        $sellerRole = Role::where('name', UserRoles::SELLER->value)->first();

        $subscription = Subscription::find($request->subscription_id);

        $imageName = 'BSNSSLG-' . uniqid() . '.' . $request->logo->extension();
        $dir = $request->logo->storeAs('/business/logo', $imageName, 'public');

        Business::create([
            'name' => $request->name,
            'type' => $request->type,
            'email' => $request->email,
            'description' => $request->description,
            'logo' => asset('/storage/' . $dir),
            'user_id' => $user->id
        ]);


        $transaction = Transaction::create([
            'transaction_reference' => 'TRNSCTN-' . uniqid(),
            'transaction_type' => 'subscription',
            'payment_type' => 'online_payment',
            'payment_reference' => $paymentData->id,
            'amount' => $paymentData->purchase_units[0]->amount->value,
            'currency' => $paymentData->purchase_units[0]->amount->currency_code
        ]);


        SubscriptionTransaction::create([
            'subscription_id' =>  $subscription->id,
            'transaction_id' => $transaction->id
        ]);


        SubscribeUser::create([
            'user_id' => $user->id,
            'subscription_id' =>  $request->subscription_id,
            'start_date' => now(),
            'end_date' => Carbon::now()->addMonth($subscription->total_months)
        ]);


        $user->assignRole($sellerRole);

        return to_route('seller.index')->with(['message' => 'successfully Registered as Seller']);
    }

    public function subscribe(string $id){
        $subscribe = SubscribeUser::find($id);


        return view('pages.profile.seller', compact(['subscribe']));
    }
}
