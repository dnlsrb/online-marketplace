<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationMessage extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'sender_id',
        'receiver_id',
        'conversation_id'
    ];



    public function sender(){
      return  $this->belongsTo(User::class);
    }

    public function receiver() {
       return  $this->belongsTo(User::class);
    }

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }
}
