<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'transaction_reference',
        'transaction_type',
        'payment_type',
        'payment_reference',
        'amount',
        'currency'
    ];



    public function subscriptionTransaction(){
        return $this->hasOne(SubscriptionTransaction::class);
    }
        
    public function orderTransaction(){
        return $this->hasOne(OrderTransaction::class);
    }
}
