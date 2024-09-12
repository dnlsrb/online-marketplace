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
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionTransaction;

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
            'payment_type' => 'paypal',
            'payment_reference' => $paymentData->id,
            'amount' => $paymentData->purchase_units[0]->amount->value,
            'currency' => $paymentData->purchase_units[0]->amount->currency_code
        ]);


        SubscriptionTransaction::create([
            'subscription_id' => $request->subscription_id,
            'transaction_id' => $transaction->id
        ]);


        $user->assignRole($sellerRole);

        return to_route('seller.index')->with(['message' => 'successfully Registered as Seller']);
    }
}
