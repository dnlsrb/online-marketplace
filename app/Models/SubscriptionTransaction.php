<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTransaction extends Model
{
    use HasFactory;


    protected $fillable =[
        'subscription_id',
        'transaction_id'
    ];


    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class);
    }
}
