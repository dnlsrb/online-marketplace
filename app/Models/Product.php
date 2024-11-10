<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'type',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cartProducts(){
        return $this->hasMany(CartProduct::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }
}
