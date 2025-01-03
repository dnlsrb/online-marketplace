<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price',
        'description',
        'total_months'
    ];



    public function subscribers(){
        return $this->hasMany(SubscribeUser::class);
    }
    public function subscriptionTransaction(){
        return $this->hasOne(SubscriptionTransaction::class);
    }
}
