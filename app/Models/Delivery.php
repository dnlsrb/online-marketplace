<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'courier',
        'order_id'
    ];



    public function order(){
        return $this->belongsTo(Order::class);
    }
}
