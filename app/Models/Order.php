<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'order_number',
        'product_id',
        'user_id',
        'quantity',
        'status',
        'total'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function delivery(){
        return $this->hasOne(Delivery::class);
    }
}
