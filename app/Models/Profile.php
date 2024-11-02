<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $fillable = [
        'last_name',
        'first_name',
        'address',
        'contact_no',
        'user_id'
    ];



    public function profile(){
        return $this->belongsTo(User::class);
    }
}
