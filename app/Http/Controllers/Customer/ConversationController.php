<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\ConversationMessage;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $productId = $request->product_id;

        $user = Auth::user();
        $conversation = Conversation::whereHas('participant', function ($q) use ($productId) {
            $q->whereHas('products', function ($q) use ($productId) {
                $q->where('id', $productId);
            });
        })->where('owner_id', $user->id)->with(['messages', 'participant'])->first();



        if ($productId && !$conversation) {

            $seller = Product::find($productId)->user;

            $conversation = Conversation::create([
                'owner_id' => $user->id,
                'participant_id' => $seller->id
            ])->with(['messages', 'participant']);
        }


        $conversations = Conversation::where(function ($q) use ($user) {
            $q->where('owner_id', $user->id)
            ->orWhere('participant_id', $user->id);
        })->with(['messages' => function ($q) {
            $q->latest()->get();
        }, 'participant', 'owner'])->latest()->get();




        return view('pages.chat.index', compact('conversations', 'conversation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $conversation = Conversation::find($request->conversationId);
        $user = Auth::user();
        $message = ConversationMessage::create([
            'content' => $request->content,
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'receiver_id' => $conversation->owner->id === $user->id ? $conversation->participant->id : $conversation->owner->id
        ]);

        return response([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
