<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;


    protected $fillable =[
        'name',
        'type',
        'email',
        'description',
        'logo',
        'user_id'
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
}
